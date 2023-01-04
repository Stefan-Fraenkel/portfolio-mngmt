<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    public function educations()
    {
        return $this->belongsToMany(Education::class);
    }

    public function employments()
    {
        return $this->belongsToMany(Employment::class);
    }

    public function expertises()
    {
        return $this->belongsToMany(Expertise::class);
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }

    public function trainings()
    {
        return $this->belongsToMany(Training::class);
    }
}
