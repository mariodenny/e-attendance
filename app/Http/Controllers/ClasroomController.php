<?php

namespace App\Http\Controllers;

use App\Services\ClassroomService;
use Illuminate\Http\Request;

class ClasroomController extends Controller
{
    public function __construct(
        private ClassroomService $classroomService
    ) {}

    public function index(Request $request)
    {
        $filters = $request->only(['teacher_id', 'student_id', 'module_id', 'terms', 'year', 'search']);
        
        $classrooms = $this->classroomService->getFilteredClassrooms($filters);
        $filterOptions = $this->classroomService->getFilterOptions();
        
        return view('classrooms.index', compact('classrooms', 'filterOptions', 'filters'));
    }

    public function teacherClassrooms(Request $request)
    {
        $teacherId = auth()->id(); 
        $filters = $request->only(['terms', 'year']);
        
        $classrooms = $this->classroomService->getTeacherClassroomsWithStats($teacherId);
        $stats = $this->classroomService->getClassroomStatistics($teacherId);
        
        return view('teacher.classrooms', compact('classrooms', 'stats'));
    }
}
