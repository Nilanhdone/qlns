<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Foreigner extends Model
{
	public $table = "foreigners";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'name', 'year', 'relationship', 'nationality'
    ];
}
