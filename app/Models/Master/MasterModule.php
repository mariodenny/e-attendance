<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

class MasterModule extends Model
{
    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo(MasterCategory::class, 'm_category_id', 'id');
    }
}
