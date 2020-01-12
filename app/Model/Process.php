<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Process extends Model
{
	public $table = "processs";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'branch', 'unit', 'position', 'start_day', 'end_day', 'salary', 'insurance'
    ];
}
