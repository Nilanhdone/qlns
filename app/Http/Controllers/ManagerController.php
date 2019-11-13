<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Model\Vacation;
use App\Model\User;

class ManagerController extends Controller
{
    public function showVacationList()
    {
        $user = Auth::user();
        $work_unit = $user->work_unit;
        $vacations = Vacation::where('work_unit', $work_unit)->get();

        if (isset($vacations) && !empty($vacations)) {
            $flag =1;
            $vacation_list = array();
            foreach ($vacations as $key => $vacation) {
                $user_name = User::where('user_id', $vacation->user_id)->first()->name;
                $array = array($vacation, $user_name);
                $vacation_list[] = $array;
            }
            
            return view('user.manager.vacation-list', compact('user', 'vacation_list', 'flag'));
        } else {
            $flag = 0;
            return view('user.manager.vacation-list', compact('user', 'flag'));
        }   
    }

    public function check()
    {

    }
}
