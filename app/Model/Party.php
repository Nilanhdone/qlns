<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
	public $table = "partys";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'join_day', 'unit', 'position'
    ];
}
