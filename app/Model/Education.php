<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
	public $table = "educations";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'start_day', 'end_day', 'level', 'address'
    ];
}
