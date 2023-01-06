<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'profiles';

    /**
     * get the associated images
     */
    public function images()
    {
        return $this->hasMany(ProfileImages::class);
    }

    /**
     * get the associated tags
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

}
