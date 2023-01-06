<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileImage extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'profile_images';

    /**
     * get the associated profile
     */
    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    /**
     * get the associated tags
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

}
