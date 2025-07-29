<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use SoftDeletes;

    protected $fillable = ['university_id', 'college_id', 'major_id', 'name_ar', 'name_en', 'code', 'description'];

    public function major()
    {
        return $this->belongsTo(Major::class);
    }

    public function summaries()
    {
        return $this->hasMany(Summary::class);
    }

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
