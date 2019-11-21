<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Vacation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status', 'user_id', 'unit', 'title', 'reason', 'start_day' ,'end_day'
    ];
}
