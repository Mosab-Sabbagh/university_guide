<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookPost extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'user_id',
        'university_id',
        'college_id',
        'title',
        'description',
        'is_free',
        'price',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function requests()
    {
        return $this->hasMany(BookRequest::class);
    }

}
