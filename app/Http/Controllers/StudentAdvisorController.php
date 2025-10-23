<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentAdvisorController extends Controller
{
    public function dashboard()
    {

        $studentTotals = 4;
        $trialStudents = 12;
        $conversionRate = 10;

        return view('dashboard.student-advisor.index', compact('studentTotals','trialStudents','conversionRate'));
    }

    // TODO : Flow student trial 
    // 1. panggil form untuk input
    public function formTrial()
    {
        return view('dashboard.student-advisor.trial');
    }
}
