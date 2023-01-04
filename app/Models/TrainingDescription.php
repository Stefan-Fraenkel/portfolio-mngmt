<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingDescription extends Model 
{
    use HasFactory;

    public function training()
    {
        return $this->belongsTo(Training::class);
    }

}
