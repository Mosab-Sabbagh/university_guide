<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    protected $fillable = [
        'name_ar',
        'name_en',
        'abbreviation',
        'city',
        'address',
        'website',
        'email',
        'phone',
        'description',
        'is_active',
    ];

    public function colleges()
    {
        return $this->hasMany(College::class);
    }

}
