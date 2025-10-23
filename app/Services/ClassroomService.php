<?php

namespace App\Services;

use App\Repositories\ClassroomRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Collection;

class ClassroomService
{
    public function __construct(
        private ClassroomRepository $classroomRepository
    ) {}

    public function getFilteredClassrooms(array $filters = []): Paginator
    {
        return $this->classroomRepository->getWithFilters($filters);
    }

    public function getTeacherClassrooms(int $teacherId, array $filters = []): Collection
    {
        return $this->classroomRepository->getByTeacher($teacherId, $filters);
    }

    public function getTeacherClassroomsWithStats(int $teacherId): Collection
    {
        return $this->classroomRepository->getClassroomsWithAttendanceStats($teacherId);
    }

    public function getClassroomDetails(int $classroomId): ?object
    {
        $classroom = $this->classroomRepository->findById($classroomId);
        
        if ($classroom) {
            // Add additional business logic here
            $classroom->current_meeting = $this->calculateCurrentMeeting($classroom);
            $classroom->upcoming_reports = $this->getUpcomingReports($classroom);
        }
        
        return $classroom;
    }

    public function getClassroomStatistics(int $teacherId = null): array
    {
        return $this->classroomRepository->getClassroomStats($teacherId);
    }

    public function createClassroom(array $data): object
    {
        // Add validation and business logic before creation        
        return $this->classroomRepository->createClassroom($data);
    }

    public function getFilterOptions(): array
    {
        return $this->classroomRepository->getFilterOptions();
    }

    private function calculateCurrentMeeting(object $classroom): int
    {
        // Logic to determine current meeting based on start date, schedule, etc.
        // For now, return a default or calculate based on your business rules
        return 1;
    }

    private function getUpcomingReports(object $classroom): array
    {
        $upcoming = [];
        $specialMeetings = [5, 10, 19];
        
        foreach ($specialMeetings as $meeting) {
            // Check if report is needed for this meeting
            $upcoming[] = [
                'meeting_number' => $meeting,
                'type' => $this->getReportType($meeting),
                'due_date' => $this->calculateDueDate($classroom, $meeting)
            ];
        }
        
        return $upcoming;
    }

    private function getReportType(int $meetingNumber): string
    {
        return match($meetingNumber) {
            5 => 'Laporan Pertama',
            10 => 'Laporan Kedua', 
            19 => 'PTC Preparation',
            default => 'Laporan'
        };
    }

    private function calculateDueDate(object $classroom, int $meetingNumber): string
    {
        // Calculate due date based on classroom schedule
        return now()->addWeeks($meetingNumber)->format('Y-m-d');
    }
}