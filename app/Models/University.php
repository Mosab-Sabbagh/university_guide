<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class University extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name_ar',
        'name_en',
        'abbreviation',
        'city',
        'address',
        'website',
        'email',
        'phone',
        'description',
    ];

    public function colleges()
    {
        return $this->belongsToMany(College::class, 'university_college');
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function summaries()
    {
        return $this->hasMany(Summary::class);
    }


    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }
}
