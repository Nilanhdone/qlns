<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Timekeep extends Model
{
    public $table = "timekeeps";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'status', 'day'
    ];
}
