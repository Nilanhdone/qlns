<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'department', 'work_unit', 'position', 'start_day' ,'end_day', 'salary', 'insurance_number'
    ];
}
