<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookRequest extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'user_id', 'book_post_id', 'message', 'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bookPost()
    {
        return $this->belongsTo(BookPost::class);
    }
}
