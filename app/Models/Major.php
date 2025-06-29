<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    protected $fillable = [
        'college_id',
        'name_ar',
        'name_en',
        'code',
        'description',
        'is_active',
    ];
    public function college()
    {
        return $this->belongsTo(College::class);
    }
}
