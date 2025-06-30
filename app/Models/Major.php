<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Major extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'college_id',
        'name_ar',
        'name_en',
        'code',
        'description',
    ];
    public function college()
    {
        return $this->belongsTo(College::class);
    }
}
