<?php

namespace App\Models;

use App\Models\Master\MasterModule;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $guarded = ['id'];


    public function module()
    {
        return $this->hasOne(MasterModule::class);
    }
}
