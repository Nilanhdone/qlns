<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'unit', 'time', 'title', 'description',
    ];
}