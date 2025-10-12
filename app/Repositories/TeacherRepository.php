<?php

namespace App\Repositories;

use App\Models\Teacher;


class TeacherRepository{

    protected $model;

    public function __construct(
        Teacher $model
    ){  
        $this->model = $model;
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

}