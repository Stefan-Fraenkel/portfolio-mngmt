<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationDescription extends Model
{
    use HasFactory;

    public function education()
    {
        return $this->belongsTo(Education::class);
    }

}
