<?php

namespace App\Repositories;

use App\Models\Clasroom;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Collection;

class ClassroomRepository
{
    protected $classroomModel;
    
    public function __construct(Clasroom $classroomModel)
    {
        $this->classroomModel = $classroomModel;
    }

    /**
     * Get classrooms with filters
     */
    public function getWithFilters(array $filters = []): Paginator
    {
        $query = $this->classroomModel->with(['teacher', 'students', 'module']);

        // Filter by teacher_id
        if (!empty($filters['teacher_id'])) {
            $query->where('teacher_id', $filters['teacher_id']);
        }

        // Filter by student_id (classrooms that have this student)
        if (!empty($filters['student_id'])) {
            $query->whereHas('students', function($q) use ($filters) {
                $q->where('students.id', $filters['student_id']);
            });
        }

        // Filter by module_id
        if (!empty($filters['module_id'])) {
            $query->where('m_module_id', $filters['module_id']);
        }

        // Filter by terms
        if (!empty($filters['terms'])) {
            $query->where('terms', $filters['terms']);
        }

        // Filter by year
        if (!empty($filters['year'])) {
            $query->where('year', $filters['year']);
        }

        // Filter by search (teacher name, module name, etc)
        if (!empty($filters['search'])) {
            $query->where(function($q) use ($filters) {
                $q->whereHas('teacher', function($q2) use ($filters) {
                    $q2->where('name', 'like', "%{$filters['search']}%");
                })->orWhereHas('module', function($q2) use ($filters) {
                    $q2->where('name', 'like', "%{$filters['search']}%");
                });
            });
        }

        return $query->orderBy('year', 'desc')
                    ->orderBy('terms')
                    ->orderBy('created_at', 'desc')
                    ->paginate(10);
    }

    /**
     * Get classroom by ID with full relations
     */
    public function findById(int $id): ?Clasroom
    {
        return $this->classroomModel
            ->with(['teacher', 'students', 'module'])
            ->find($id);
    }

    /**
     * Get classrooms for a specific teacher
     */
    public function getByTeacher(int $teacherId, array $filters = []): Collection
    {
        $query = $this->classroomModel
            ->with(['students', 'module'])
            ->where('teacher_id', $teacherId);

        // Additional filters for teacher's classrooms
        if (!empty($filters['terms'])) {
            $query->where('terms', $filters['terms']);
        }

        if (!empty($filters['year'])) {
            $query->where('year', $filters['year']);
        }

        if (!empty($filters['status'])) {
            $query->where('status', $filters['status']);
        }

        return $query->orderBy('year', 'desc')
                    ->orderBy('terms')
                    ->get();
    }

    /**
     * Get classrooms for a specific student
     */
    public function getByStudent(int $studentId, array $filters = []): Collection
    {
        $query = $this->classroomModel
            ->with(['teacher', 'module'])
            ->whereHas('students', function($q) use ($studentId) {
                $q->where('students.id', $studentId);
            });

        if (!empty($filters['terms'])) {
            $query->where('terms', $filters['terms']);
        }

        if (!empty($filters['year'])) {
            $query->where('year', $filters['year']);
        }

        return $query->orderBy('year', 'desc')
                    ->orderBy('terms')
                    ->get();
    }

    /**
     * Get classroom statistics
     */
    public function getClassroomStats(int $teacherId = null): array
    {
        $query = $this->classroomModel;

        if ($teacherId) {
            $query->where('teacher_id', $teacherId);
        }

        $totalClassrooms = $query->count();
        $activeClassrooms = $query->where('status', 'active')->count();
        
        // Get current year and terms for active counts
        $currentYear = date('Y');
        $currentClassrooms = $query->where('year', $currentYear)
                                 ->where('status', 'active')
                                 ->count();

        return [
            'total_classrooms' => $totalClassrooms,
            'active_classrooms' => $activeClassrooms,
            'current_year_classrooms' => $currentClassrooms,
        ];
    }

    /**
     * Create new classroom
     */
    public function createClassroom(array $data): Clasroom
    {
        return $this->classroomModel->create($data);
    }

    /**
     * Update classroom
     */
    public function updateClassroom(int $id, array $data): bool
    {
        return $this->classroomModel->where('id', $id)->update($data);
    }

    /**
     * Add student to classroom
     */
    public function addStudentToClassroom(int $classroomId, int $studentId): bool
    {
        $classroom = $this->classroomModel->find($classroomId);
        if ($classroom) {
            $classroom->students()->syncWithoutDetaching([$studentId]);
            return true;
        }
        return false;
    }

    /**
     * Remove student from classroom
     */
    public function removeStudentFromClassroom(int $classroomId, int $studentId): bool
    {
        $classroom = $this->classroomModel->find($classroomId);
        if ($classroom) {
            $classroom->students()->detach($studentId);
            return true;
        }
        return false;
    }

    /**
     * Get classrooms with attendance statistics
     */
    public function getClassroomsWithAttendanceStats(int $teacherId = null): Collection
    {
        $query = $this->classroomModel->with(['teacher', 'students', 'module']);

        if ($teacherId) {
            $query->where('teacher_id', $teacherId);
        }

        return $query->get()->map(function($classroom) {
            $classroom->students_count = $classroom->students->count();
            
            // Calculate attendance statistics
            $totalMeetings = 20;
            $totalPossibleAttendances = $classroom->students_count * $totalMeetings;
            $recordedAttendances = 0;
            
            foreach ($classroom->students as $student) {
                $recordedAttendances += $student->attendances->count();
            }
            
            $classroom->attendance_stats = [
                'total_students' => $classroom->students_count,
                'total_meetings' => $totalMeetings,
                'recorded_attendances' => $recordedAttendances,
                'completion_percentage' => $totalPossibleAttendances > 0 
                    ? round(($recordedAttendances / $totalPossibleAttendances) * 100, 2)
                    : 0
            ];
            
            return $classroom;
        });
    }

    /**
     * Get available years and terms for filtering
     */
    public function getFilterOptions(): array
    {
        $years = $this->classroomModel->select('year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year')
            ->toArray();

        $terms = $this->classroomModel->select('terms')
            ->distinct()
            ->orderBy('terms')
            ->pluck('terms')
            ->toArray();

        return [
            'years' => $years,
            'terms' => $terms
        ];
    }
}