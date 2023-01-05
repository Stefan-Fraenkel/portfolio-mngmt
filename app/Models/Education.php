<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'educations';

    /**
     * get the associated descriptions
     */
    public function descriptions()
    {
        return $this->hasMany(EducationDescription::class);
    }

    /**
     * get the associated tags
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

}
