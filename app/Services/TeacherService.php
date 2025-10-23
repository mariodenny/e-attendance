<?php


namespace App\Services;

use App\Repositories\TeacherRepository;


class TeacherService{
    

    protected $teacherRepository;

    public function __construct(
        TeacherRepository $teacherRepository
    ){
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

}
