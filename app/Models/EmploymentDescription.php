<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmploymentDescription extends Model
{
    use HasFactory;

    public function employment()
    {
        return $this->belongsTo(Employment::class);
    }

}
