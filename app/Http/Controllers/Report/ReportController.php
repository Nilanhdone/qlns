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
        $degree_number = $this->getNumber('degree');
        $national_number = $this->getNumber('national');
        $religion_number = $this->getNumber('religion');
        $recruitment_number = $this->getNumber('recruitment');
        $birthday_number = $this->getNumber('birthday');

        return view('account.report.report',
            compact('staff_number', 'retire_number', 'degree_number', 'national_number', 'religion_number', 'recruitment_number', 'birthday_number'));
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
        } elseif ($type == 'degree') {
            $users = User::where('status', 'new')->orderBy('degree')->get();
        } elseif ($type == 'national') {
            $users = User::where('status', 'new')->orderBy('nationality')->get();
        } elseif ($type == 'religion') {
            $users = User::where('status', 'new')->orderBy('religion')->get();
        } elseif ($type == 'recruitment') {
            $users = User::where('status', 'new')->orderBy('recruitment_day')->get();
        } elseif ($type == 'birthday') {
            $users = User::where('status', 'new')->orderBy('birthday')->get();
        }

        return count($users);
    }
}
