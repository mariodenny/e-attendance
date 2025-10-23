<?php

namespace App\Http\Controllers;

use App\Services\AttendanceService;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

class AttendanceController extends Controller
{
    public function __construct(
        private AttendanceService $attendanceService
    ) {}

    public function index(Request $request): View
    {
        $filters = $request->only([
            'status', 'search', 'start_date', 'end_date', 
            'meeting_number', 'student_id', 'teacher_id'
        ]);

        $attendances = $this->attendanceService->getFilteredAttendances($filters);
        $stats = $this->attendanceService->getAttendanceStatistics();

        return view('attendance.index', compact('attendances', 'stats', 'filters'));
    }

    public function studentSummary(int $studentId): View
    {
        $attendanceData = $this->attendanceService->getStudentAttendanceGrid($studentId);
        
        return view('attendance.student-summary', [
            'grid' => $attendanceData['grid'],
            'summary' => $attendanceData['summary'],
            'studentId' => $studentId
        ]);
    }

    public function allStudentsSummary(): View
    {
        $students = $this->attendanceService->getAllStudentsSummary();
        
        return view('attendance.all-students-summary', compact('students'));
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'teacher_id' => 'required|exists:teachers,id',
            'student_id' => 'required|exists:students,id',
            'meeting_number' => 'required|integer|between:1,20',
            'status' => 'required|in:Y,N',
            'date' => 'required|date',
            'notes' => 'nullable|string'
        ]);

        $success = $this->attendanceService->saveAttendance($data);

        if ($success) {
            return redirect()->back()->with('success', 'Attendance recorded successfully!');
        }

        return redirect()->back()->with('error', 'Failed to record attendance.');
    }

    public function bulkUpdate(Request $request, int $studentId): RedirectResponse
    {
        $request->validate([
            'attendances' => 'required|array',
            'attendances.*.meeting_number' => 'required|integer|between:1,20',
            'attendances.*.status' => 'required|in:Y,N',
            'attendances.*.teacher_id' => 'required|exists:teachers,id'
        ]);

        $success = $this->attendanceService->saveBulkAttendance($studentId, $request->attendances);

        if ($success) {
            return redirect()->back()->with('success', 'Bulk attendance updated successfully!');
        }

        return redirect()->back()->with('error', 'Failed to update bulk attendance.');
    }

    public function getMeetingDetails(int $studentId, int $meetingNumber): JsonResponse
    {
        $attendance = $this->attendanceService->getAttendanceByMeeting($studentId, $meetingNumber);
        
        return response()->json([
            'success' => true,
            'data' => $attendance
        ]);
    }
}