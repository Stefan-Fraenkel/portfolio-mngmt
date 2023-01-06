<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employment extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /**
     * get the associated descriptions
     */
    public function descriptions()
    {
        return $this->hasMany(EmploymentDescription::class);
    }

    /**
     * get the associated references
     */
    public function references()
    {
        return $this->belongsToMany(Reference::class);
    }

    /**
     * get the associated tags
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

}
