<?php

namespace App\Repositories;

use App\Models\Attendance;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class AttendanceRepository
{
    protected $model;

    public function __construct(Attendance $model)
    {
        $this->model = $model;
    }

    public function getAllAttendanceWithTeacherAndStudents(): Collection
    {
        return $this->model->with(['student', 'teacher'])->get();
    }

    public function saveAttendance(array $data): Attendance
    {
        return $this->model->create($data);
    }

    public function getWithFilters(array $filters = []): Paginator
    {
        $query = $this->model->with(['student', 'teacher']);

        if (!empty($filters['status'])) {
            $query->where('status', $filters['status']);
        }

        if (!empty($filters['search'])) {
            $query->whereHas('student', function($q) use ($filters) {
                $q->where('name', 'like', "%{$filters['search']}%");
            });
        }

        if (!empty($filters['start_date'])) {
            $query->where('date', '>=', $filters['start_date']);
        }

        if (!empty($filters['end_date'])) {
            $query->where('date', '<=', $filters['end_date']);
        }

        if (!empty($filters['meeting_number'])) {
            $query->where('meeting_number', $filters['meeting_number']);
        }

        if (!empty($filters['student_id'])) {
            $query->where('student_id', $filters['student_id']);
        }

        if (!empty($filters['teacher_id'])) {
            $query->where('teacher_id', $filters['teacher_id']);
        }

        return $query->orderBy('date')->paginate(10);
    }

    /**
     * Get attendance statistics with meeting number context
     */
    public function getAttendanceStats(): array
    {
        return [
            'total' => $this->model->count(),
            'present' => $this->model->where('status', 'Y')->count(),
            'absent' => $this->model->where('status', 'N')->count(),
            'total_meetings' => 20, 
        ];
    }

    /**
     * Get student-specific attendance summary with percentages
     */
    public function getStudentAttendanceSummary(int $studentId): array
    {
        $totalMeetings = 20;
        
        $stats = $this->model
            ->where('student_id', $studentId)
            ->select(
                DB::raw('COUNT(*) as recorded_meetings'),
                DB::raw('SUM(CASE WHEN status = "Y" THEN 1 ELSE 0 END) as present_count'),
                DB::raw('SUM(CASE WHEN status = "N" THEN 1 ELSE 0 END) as absent_count')
            )
            ->first();

        $presentCount = $stats->present_count ?? 0;
        $absentCount = $stats->absent_count ?? 0;
        $recordedMeetings = $stats->recorded_meetings ?? 0;

        return [
            'total_meetings' => $totalMeetings,
            'recorded_meetings' => $recordedMeetings,
            'present_count' => $presentCount,
            'absent_count' => $absentCount,
            'present_percentage' => $totalMeetings > 0 ? round(($presentCount / $totalMeetings) * 100, 2) : 0,
            'absent_percentage' => $totalMeetings > 0 ? round(($absentCount / $totalMeetings) * 100, 2) : 0,
            'remaining_meetings' => $totalMeetings - $recordedMeetings,
            'completion_percentage' => $totalMeetings > 0 ? round(($recordedMeetings / $totalMeetings) * 100, 2) : 0
        ];
    }

    /**
     * Get attendance grid for a student (meetings 1-20)
     */
    public function getStudentAttendanceGrid(int $studentId): Collection
    {
        return $this->model
            ->where('student_id', $studentId)
            ->whereBetween('meeting_number', [1, 20])
            ->orderBy('meeting_number')
            ->get()
            ->keyBy('meeting_number');
    }

    /**
     * Get specific meeting attendance for a student
     */
    public function getAttendanceByMeeting(int $studentId, int $meetingNumber): ?Attendance
    {
        return $this->model
            ->where('student_id', $studentId)
            ->where('meeting_number', $meetingNumber)
            ->with(['student', 'teacher'])
            ->first();
    }

    /**
     * Bulk update/create attendance for multiple meetings
     */
    public function saveBulkAttendance(int $studentId, array $attendances): bool
    {
        try {
            DB::beginTransaction();

            foreach ($attendances as $meetingData) {
                $this->model->updateOrCreate(
                    [
                        'student_id' => $studentId,
                        'meeting_number' => $meetingData['meeting_number']
                    ],
                    [
                        'teacher_id' => $meetingData['teacher_id'],
                        'status' => $meetingData['status'],
                        'date' => $meetingData['date'] ?? now(),
                        'notes' => $meetingData['notes'] ?? null
                    ]
                );
            }

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    /**
     * Get all students with their attendance summaries
     */
    public function getAllStudentsSummary(): Collection
    {
        return $this->model
            ->with('student')
            ->select(
                'student_id',
                DB::raw('COUNT(*) as recorded_meetings'),
                DB::raw('SUM(CASE WHEN status = "Y" THEN 1 ELSE 0 END) as present_count'),
                DB::raw('SUM(CASE WHEN status = "N" THEN 1 ELSE 0 END) as absent_count')
            )
            ->groupBy('student_id')
            ->get()
            ->map(function($item) {
                $totalMeetings = 20;
                $presentCount = $item->present_count;
                
                $item->present_percentage = round(($presentCount / $totalMeetings) * 100, 2);
                $item->absent_percentage = round(($item->absent_count / $totalMeetings) * 100, 2);
                $item->completion_percentage = round(($item->recorded_meetings / $totalMeetings) * 100, 2);
                $item->needs_consultation = $item->absent_percentage > 30;
                
                return $item;
            });
    }
}