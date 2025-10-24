<?php

namespace App\Models;

use App\Models\Master\MasterModule;
use Illuminate\Database\Eloquent\Model;

class Trial extends Model
{
    protected $guarded = ['id'];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id', 'id');
    }

    public function module()
    {
        return $this->belongsTo(MasterModule::class, 'm_module_id', 'id');
    }
}
