<?php

namespace App\Services;

use App\Repositories\AttendanceRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Collection;

class AttendanceService
{
    private const TOTAL_MEETINGS = 20;

    public function __construct(
        private AttendanceRepository $attendanceRepository
    ) {}

    public function getFilteredAttendances(array $filters = []): Paginator
    {
        return $this->attendanceRepository->getWithFilters($filters);
    }

    public function getAttendanceStatistics(): array
    {
        return $this->attendanceRepository->getAttendanceStats();
    }

    public function getStudentAttendanceSummary(int $studentId): array
    {
        $summary = $this->attendanceRepository->getStudentAttendanceSummary($studentId);
        
        // Add business logic
        $summary['needs_consultation'] = $summary['absent_percentage'] > 30;
        $summary['consultation_message'] = $this->getConsultationMessage($summary['absent_percentage']);
        $summary['performance_status'] = $this->getPerformanceStatus($summary['present_percentage']);
        
        return $summary;
    }

    public function getStudentAttendanceGrid(int $studentId): array
    {
        $attendances = $this->attendanceRepository->getStudentAttendanceGrid($studentId);
        $summary = $this->getStudentAttendanceSummary($studentId);

        $grid = [];
        for ($i = 1; $i <= self::TOTAL_MEETINGS; $i++) {
            $attendance = $attendances->get($i);
            $grid[] = [
                'meeting_number' => $i,
                'status' => $attendance->status ?? null,
                'date' => $attendance->date ?? null,
                'notes' => $attendance->notes ?? null,
                'teacher_name' => $attendance->teacher->name ?? null,
                'formatted_status' => $this->formatStatus($attendance->status ?? null),
                'badge_class' => $this->getStatusBadgeClass($attendance->status ?? null),
                'is_recorded' => !is_null($attendance)
            ];
        }

        return [
            'grid' => $grid,
            'summary' => $summary
        ];
    }

    public function saveAttendance(array $data): bool
    {
        try {
            $this->attendanceRepository->saveAttendance($data);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function saveBulkAttendance(int $studentId, array $attendances): bool
    {
        return $this->attendanceRepository->saveBulkAttendance($studentId, $attendances);
    }

    public function getAllStudentsSummary(): Collection
    {
        return $this->attendanceRepository->getAllStudentsSummary();
    }

    public function getAttendanceByMeeting(int $studentId, int $meetingNumber): ?object
    {
        return $this->attendanceRepository->getAttendanceByMeeting($studentId, $meetingNumber);
    }

    private function getConsultationMessage(float $absentPercentage): string
    {
        if ($absentPercentage > 50) {
            return "Low Attendance Percentage. Please do the consultation";
        } elseif ($absentPercentage > 30) {
            return "Need Consultation to cover the missing lesson";
        } elseif ($absentPercentage > 20) {
            return "Need consultation";
        } else {
            return "Keep up the good work!";
        }
    }

    private function getPerformanceStatus(float $presentPercentage): string
    {
        if ($presentPercentage >= 90) return "Excellent";
        if ($presentPercentage >= 80) return "Good";
        if ($presentPercentage >= 70) return "Fair";
        if ($presentPercentage >= 60) return "Need Improvement";
        return "Poor";
    }

    private function formatStatus(?string $status): string
    {
        return match($status) {
            'Y' => 'Hadir',
            'N' => 'Absen',
            default => 'Belum Input'
        };
    }

    private function getStatusBadgeClass(?string $status): string
    {
        return match($status) {
            'Y' => 'bg-success',
            'N' => 'bg-danger',
            default => 'bg-secondary'
        };
    }
}