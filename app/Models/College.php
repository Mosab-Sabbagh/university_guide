<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class College extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name_ar',
        'name_en',
        'abbreviation',
        'description',
    ];


    public function universities()
    {
        return $this->belongsToMany(University::class, 'university_college');
    }

    public function majors()
    {
        return $this->belongsToMany(Major::class, 'college_major');
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function helpRequests()
    {
        return $this->hasMany(HelpRequest::class);
    }

    public function summaries()
    {
        return $this->hasMany(Summary::class);
    }


}
