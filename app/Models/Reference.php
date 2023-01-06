<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /**
     * get the associated employments
     */
    public function employments()
    {
        return $this->belongsToMany(Employment::class);
    }

}
