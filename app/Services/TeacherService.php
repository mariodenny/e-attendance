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


    
}
