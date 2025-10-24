<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

class MasterCategory extends Model
{
    protected $guarded = ['id'];

    public function module()
    {
        return $this->hasOne(MasterModule::class, 'id', 'm_category_id');
    }
}
