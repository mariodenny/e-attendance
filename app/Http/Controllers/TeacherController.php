<?php

namespace App\Http\Controllers;

use App\Models\Trial;
use App\Services\TeacherService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{

    public function __construct(
        private TeacherService $teacherService
    ) {}
    public function dashboard()
    {
        $teacherData = $this->teacherService->teacherData(Auth::user()->id);
        $teacherId = $teacherData->id;
        $totalClasses = $this->teacherService->getTotalClass($teacherId);
        $totalStudents = $this->teacherService->getTotalStudents($teacherId);

        return view('dashboard.teacher.index', compact('teacherData', 'totalClasses', 'totalStudents'));
    }


    public function trial()
    {
        $teacherData = $this->teacherService->teacherData(Auth::user()->id);
        $todayMonth = Carbon::today()->month;
        $todayYear = Carbon::today()->year;
        $teacherId = $teacherData->id;
        $trials = $this->teacherService->getTrialByTeacherId($teacherId);
        $pendingFeedback = $this->teacherService->getemptyfeedbacks($teacherId);
        return view('dashboard.teacher.trial', compact('teacherData', 'trials', 'pendingFeedback', 'todayMonth', 'todayYear'));
    }

    public function updateFeedBack(Request $request, $trialId)
    {
        $validated = $request->validate([
            'feedback' => 'string|required'
        ]);

        if (!$validated) {
            return redirect()->route('teacher.trial')->with('error', 'please provide message!!');
        }

        $message = $validated['feedback'];

        $updateFeedback = $this->teacherService->updateFeedback($trialId, $message);
        if (!$updateFeedback) {
            return redirect()->route('teacher.trial')->with('error', 'update feedback failed!');
        }

        return redirect()->route('teacher.trial')->with('success', 'feedback  saved!');
    }
}
