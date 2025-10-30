<?php


namespace App\Services;

use App\Repositories\TeacherRepository;
use Carbon\Carbon;

class TeacherService
{


    protected $teacherRepository;

    public function __construct(
        TeacherRepository $teacherRepository
    ) {
        $this->teacherRepository = $teacherRepository;
    }

    public function createAttendance()
    {
        // 
    }

    public function teacherData($userId)
    {
        return $this->teacherRepository->getTeacherDataByUserId($userId);
    }

    public function getTotalClass($teacherId)
    {
        return $this->teacherRepository->countTeacherClasses($teacherId);
    }

    public function getTotalStudents($teacherId)
    {
        return $this->teacherRepository->countStudents($teacherId);
    }

    public function getTrialByTeacherId($teacherId)
    {
        $today = Carbon::now('Asia/Jakarta');
        $month = $today->month;
        return $this->teacherRepository->getJoinTrialByTeacherId($teacherId, $month);
    }

    public function getemptyfeedbacks($teacherId)
    {
        $today = Carbon::now('Asia/Jakarta');
        $month = $today->month;
        return $this->teacherRepository->getNullfeeback($teacherId, $month);
    }


    public function updateFeedback($trialId, $feedback)
    {
        return $this->teacherRepository->updateFeedback($trialId, $feedback);
    }
}
