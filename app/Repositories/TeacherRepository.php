<?php

namespace App\Repositories;

use App\Models\Attendance;
use App\Models\Teacher;
use App\Models\Clasroom;

class TeacherRepository{

    protected $model;
    protected $attendanceModel;
    protected $classroomModel;

    public function __construct(
        Teacher $model,
        Attendance $attendanceModel,
        Clasroom $classroomModel
    ){  
        $this->model = $model;
        $this->attendanceModel = $attendanceModel;
        $this->classroomModel = $classroomModel;
    }


    public function findTeacherById(int $id)
    {
        return $this->model->where('id',$id)->first();
    }

    public function storeNewTeacher(array $data){
        return $this->model->create($data);
    }

    public function updateTeacher(int $id, array $data)
    {
        return $this->model->where('id',$id)->update($data);
    }

    public function storeNewAttendance($data){
        return $this->attendanceModel->create($data);
    }

    public function countTeacherClasses(int $teacherId)
    {
        
        return $this->classroomModel->where('teacher_id',$teacherId)->count();
    }
    
    public function countStudents($teacherId){
        return $this->classroomModel->where('teacher_id',$teacherId)->count();
    }

    public function getTeacherDataByUserId($userId)
    {
        return $this->model->where('user_id',$userId)->firstOrFail();
    }
}