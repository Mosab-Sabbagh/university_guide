<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HelpRequestComment extends Model
{
    protected $fillable = [
        'help_request_id',
        'user_id',
        'content',
        'file',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function helpRequest()
    {
        return $this->belongsTo(HelpRequest::class);
    }

}
