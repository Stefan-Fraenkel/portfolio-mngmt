<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpertiseDescription extends Model
{
    use HasFactory;

    public function expertise()
    {
        return $this->belongsTo(Expertise::class);
    }

}
