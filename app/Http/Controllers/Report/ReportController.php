<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\User;

class ReportController extends Controller
{
    public function showReport()
    {
        $staff_number = $this->getNumber('staff');
        $retire_number = $this->getNumber('retire');
        return view('account.report.report', compact('staff_number', 'retire_number'));
    }

    public function getNumber($type)
    {
        if ($type == 'staff') {
            $users = User::where('status', 'new')->get();
        } elseif ($type == 'retire') {
            $users = User::where('status', 'new')->get();
            $today = date('Y-m-d');
            $time =  mktime(0,0,0, date('m'), date('d'), (date('Y') + 5));
            $retire_time = date('Y-m-d', $time);

            $male_first = (date('Y') - 62).'-'.date('m').'-'.date('d');
            $male_last = (date('Y') - 62 + 5).'-'.date('m').'-'.date('d');

            $female_first = (date('Y') - 60).'-'.date('m').'-'.date('d');
            $female_last = (date('Y') - 60 + 5).'-'.date('m').'-'.date('d');

            $invalid_users = User::where([['status', 'new'], ['gender', 'male'], ['birthday', '>', $male_last]])
            ->orWhere([['status', 'new'], ['gender', 'male'], ['birthday', '<', $male_first]])
            ->orWhere([['status', 'new'], ['gender', 'female'], ['birthday', '<', $female_first]])
            ->orWhere([['status', 'new'], ['gender', 'female'], ['birthday', '>', $female_last]])
            ->get();

            foreach ($invalid_users as $invalid_user) {
                $users = $users->where('user_id', '!=',$invalid_user->user_id);
            }
        }

        return count($users);
    }
}
