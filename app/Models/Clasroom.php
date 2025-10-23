<?php

namespace App\Models;

use App\Models\Master\MasterModule;
use Illuminate\Database\Eloquent\Model;

class Clasroom extends Model
{
    protected $guarded = ['id'];


    public function teacher()
    {
        return $this->hasOne(Teacher::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function module()
    {
        return $this->hasOne(MasterModule::class);
    }
}
