<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class College extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'university_id',
        'name_ar',
        'name_en',
        'abbreviation',
        'description',
    ];


    public function university()
    {
        return $this->belongsTo(University::class);
    }

    public function majors()
    {
        return $this->hasMany(Major::class);
    }

}
