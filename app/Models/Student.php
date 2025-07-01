<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'user_id',
        'university_id',
        'college_id',
        'major_id',
        'student_number',
        'enrollment_date',
        'level',
        'profile_image',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
