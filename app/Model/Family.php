<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
	public $table = "familys";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'name', 'year', 'relationship', 'address'
    ];
}
