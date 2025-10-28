<?php

namespace App\Http\Controllers;

use App\Enum\TrialEnum;
use App\Models\Master\MasterModule;
use App\Models\Teacher;
use App\Models\Trial;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Enum;

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
        $today = Carbon::now('Asia/Jakarta');

        $teachers = Teacher::get();
        $modules = MasterModule::with('category')->get();
        $trials = Trial::with(['teacher', 'module.category'])->get();
        $upcomingTrials = Trial::with('student')
            ->whereBetween('date', [$today, $today->copy()->addDays(2)])
            ->orderBy('date', 'asc')
            ->get();

        return view('dashboard.student-advisor.trial', compact('teachers', 'modules', 'trials', 'upcomingTrials'));
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
            'date' => 'nullable'
        ]);

        $status = 'PENDING'; // default status
        array_push($validatedData, $status);
        $trial = Trial::create($validatedData);

        if (!$trial) {
            return redirect()->route('student-advisor.trial')->with('error', 'Failed to save trial data!');
        }

        return redirect()->route('student-advisor.trial')->with('success', 'Schedule Created successfully!s');
    }

    // Todo -> Convert student trial
    // 3. Assign Student ke data trial 
    public function updateStatusTrial(Request $request, int $id)
    {
        $validateStatus = $request->validate([
            'status' => ['required', new Enum(TrialEnum::class)]
        ]);

        $status = $validateStatus['status'];
        $trial = Trial::findOrFail($id);

        $trial->update(['status' => $status]);

        $message = match ($status) {
            TrialEnum::CANCEL => 'Trial cancelled!',
            TrialEnum::JOIN   => 'Student joined successfully!',
            TrialEnum::ENROLL => 'Trial enrolled successfully!',
            TrialEnum::RESCHEDULE => 'Trial Reschedule Successfully!',
            default            => 'Status updated successfully!'
        };

        return redirect()
            ->route('student-advisor.trial')
            ->with('success', $message);
    }

    public function rescheduleDate(Request $request, int $id)
    {
        $validateDate = $request->validate([
            'date' => 'required|date_format:Y-m-d H:i:s'
        ]);

        $date = $validateDate['date'];
        $trial = Trial::findOrFail($id);
        if (!$trial) {
            return redirect()->route('student-advisor.trial')->with('error', 'Trial not found');
        }

        if ($date == $trial->date) {
            return redirect()->route('student-advisor.trial')->with('error', 'Trial Schedule cannot equals to old schedule!');
        }

        if ($trial->status == TrialEnum::CANCEL || $trial->status == TrialEnum::JOIN || $trial->status == TrialEnum::ENROLL) {
            return redirect()->route('student-advisor.trial')->with('error', 'Trial already ' . $trial->status);
        }

        Trial::where('id', $id)->update(['date' => $date]);

        return redirect()->route('student-advisor.trial')->with('success', 'Rescheduled successfully!');
    }

    protected function enrollNewStudentFromTrial(Request $request, int $id)
    {
        $validated = $request->validate([
            
        ]);
        $trial = Trial::findOrFail($id);
    }
}
