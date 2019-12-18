<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    public $table = "applications";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'start_day', 'end_day', 'title', 'reason'
    ];
}
