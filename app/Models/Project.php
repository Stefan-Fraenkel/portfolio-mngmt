<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /**
     * get the associated descriptions
     */
    public function descriptions()
    {
        return $this->hasMany(ProjectDescription::class);
    }

    /**
     * get the associated tags
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

}
