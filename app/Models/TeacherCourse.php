<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class TeacherCourse extends Model{
    use SoftDeletes;
    protected $table = 'teacher_course';
    protected $fillable = [
        'teacher_id',
        'course_id',
    ];
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
