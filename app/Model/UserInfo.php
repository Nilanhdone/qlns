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
        'user_id', 'status', 'position', 'department', 'work_unit', 'start_day' ,'end_day', 'salary', 'insurance_number'
    ];
}
