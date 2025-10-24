<?php

namespace App\Http\Controllers;

use App\Models\Master\MasterModule;
use App\Models\Teacher;
use App\Models\Trial;
use Illuminate\Http\Request;

class StudentAdvisorController extends Controller
{
    public function dashboard()
    {

        $studentTotals = 4;
        $trialStudents = 12;
        $conversionRate = 10;

        return view('dashboard.student-advisor.index', compact('studentTotals', 'trialStudents', 'conversionRate'));
    }

    // TODO : Flow student trial 
    // 1. panggil form untuk input
    public function formTrial()
    {

        $teachers = Teacher::get();
        $modules = MasterModule::get();

        return view('dashboard.student-advisor.trial', compact('teachers', 'modules'));
    }

    // 2. save data trial
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'm_module_id' => 'exists:master_modules,id',
            'teacher_id' => 'exists:teachers,id',
            'name' => 'string|max:255|required',
            'contact_person' => 'string|max:255|required',
            'phone_no' => 'string|max:13',
            'date' => 'nullable',
        ]);

        $trial = Trial::create($validatedData);

        if (!$trial) {
            return redirect()->route('student-advisor.trial')->with('error', 'Failed to save trial data!');
        }

        return redirect()->route('student-advisor.trial')->with('success', 'Schedule Created successfully!s');
    }

    // Todo -> Convert student trial
    // 3. Assign Student ke data trial 
    public function convertTrialToStudent()
    {
        
    }
}
