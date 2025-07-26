<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Summary extends Model
{
    protected $fillable = ['user_id', 'university_id', 'college_id', 'course_id', 'title', 'description', 'file_path'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function university()
    {
        return $this->belongsTo(University::class);
    }

    public function college()
    {
        return $this->belongsTo(College::class);
    }
}
