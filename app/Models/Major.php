<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Major extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name_ar',
        'name_en',
        'code',
        'description',
    ];
    public function colleges()
    {
        return $this->belongsToMany(College::class, 'college_major');
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
    
    public function courses()
    {
        return $this->hasMany(Course::class);
    }

}
