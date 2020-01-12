<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
	public $table = "disciplines";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'discipline', 'year', 'method'
    ];
}
