<?php

namespace App\Models;

use App\Models\Master\MasterModule;
use Illuminate\Database\Eloquent\Model;

class Trial extends Model
{
    protected $guarded = ['id'];

    public function teacher()
    {
        return $this->hasOne(Teacher::class,'teacher_id','id');
    }

    public function module()
    {
        return $this->hasOne(MasterModule::class,'module_id','id');
    }
}
