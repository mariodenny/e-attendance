<?php

namespace App\Http\Controllers;

use App\Services\TeacherService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{

    public function __construct(
        private TeacherService $teacherService
    )
    {

    }
    public function dashboard()
    {
        $teacherData = $this->teacherService->teacherData(Auth::user()->id);
        $teacherId = $teacherData->id;
        $totalClasses = $this->teacherService->getTotalClass($teacherId);
        $totalStudents = $this->teacherService->getTotalStudents($teacherId);

        return view('dashboard.teacher.index', compact('teacherData','totalClasses','totalStudents'));
    }

    
}
