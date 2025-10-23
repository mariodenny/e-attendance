<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $guarded = [
        'id'
    ];


    public function teacher(){
        return $this->hasOne(Teacher::class);
    }

    public function student(){
        return $this->hasOne(Student::class);
    }
}
