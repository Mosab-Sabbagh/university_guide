<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Book extends Model
{
    protected $fillable = ['title', 'description', 'file_path', 'course_id'];
    public function course()
    {
        return $this->belongsTo(Course::class);
    }


    // accessor to get the file size in a human-readable format

    // in blade use (file_size)
    public function getFileSizeAttribute()
    {
        if (!$this->file_path || !Storage::disk('public')->exists($this->file_path)) {
            return null;
        }

        $bytes = Storage::disk('public')->size($this->file_path);

        // تحويل الحجم إلى وحدة مناسبة
        if ($bytes >= 1048576) {
            return round($bytes / 1048576, 2) . ' MB';
        } elseif ($bytes >= 1024) {
            return round($bytes / 1024, 2) . ' KB';
        } else {
            return $bytes . ' B';
        }
    }
}
