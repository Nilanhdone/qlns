<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class EmployeeController extends Controller
{
    public function showVacationForm()
    {
    	$user = Auth::user();
        return view('user.employee.vacation-leave', compact('user'));
    }

    public function sendVacation()
    {

    }
}
