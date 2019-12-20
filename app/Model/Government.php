<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Government extends Model
{
	public $table = "governments";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'start_day', 'end_day', 'unit', 'position'
    ];
}
