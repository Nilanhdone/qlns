<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Laudatory extends Model
{
	public $table = "laudatorys";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'title', 'year', 'organization', 'content'
    ];
}
