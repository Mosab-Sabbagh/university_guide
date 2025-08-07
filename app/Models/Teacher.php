<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'email',
        'biography',
        'profile_picture',
        'phone',
        'university_id',
        'college_id',
    ];

    public function university()
    {
        return $this->belongsTo(University::class);
    }

    public function college()
    {
        return $this->belongsTo(College::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'teacher_course');
    }
    
}
