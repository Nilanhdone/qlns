<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class EduHis extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'start_day', 'end_day', 'unit', 'address'
    ];
}
