<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Infringe extends Model
{
	public $table = "infringes";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'infringe', 'year', 'organization', 'method'
    ];
}
