<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Model\Unit;
use App\Model\Position;
use App\Model\User;
use App\Model\Education;
use App\Model\Training;
use App\Model\Timekeep;
use App;
use session;
use Auth;
use DateTime;

class CalendarController extends Controller
{
    private function  getWeekCalendar($current_month, $current_year)
    {
        // chọn ngày đầu tiên của tháng đó
        $first_day = new DateTime();
        $first_day->setDate($current_year, $current_month, 1);
        // lấy ra số ngày trong tháng
        $day_number = cal_days_in_month(CAL_GREGORIAN, $current_month, $current_year);

        // lấy thứ của ngày đầu tiên
        $week_first_day = $first_day->format('N'); // thứ 2 - CN tương đương 1 -7
        // lấy chênh lệch đầu tháng
        $null_start_days = $week_first_day - 1; // số ngày trống ở tuần đầu tiên
        // số ngày cuối cùng của tuần đầu tiên
        $days_in_end_of_first_week = 7- $null_start_days;
        // lấy chênh lệch cuối tháng
        if ($day_number == 28) {
            $null_end_days = 7 - $null_start_days;
        } else if ($day_number == 29) {
            $null_end_days = abs(6 - $null_start_days);
        } else if ($day_number == 30) {
            $null_end_days = abs(5 - $null_start_days);
        } else if ($day_number == 31) {
            $null_end_days = abs(4 - $null_start_days);
        }

        // số ngày đầu tiên của tuần cuối cùng
        $days_in_start_of_final_week = 7 - $null_end_days;

        // tạo các tuần để hiển thị
        $calendar = array();
        // trường hợp có 4 tuần, tháng 28 ngày, ngày đầu tiên là thứ hai
        if ($week_first_day == 1 && $day_number == 28) {
            $week_1 = array(1,2,3,4,5,6,7);
            $week_2 = array(8,9,10,11,12,13,14);
            $week_3 = array(15,16,17,18,19,20,21);
            $week_4 = array(22,23,24,25,26,27,28);
            $week_5 = array();
            $week_6 = array();
            $calendar = array($week_1,$week_2,$week_3,$week_4,$week_5, $week_6);
        } else if ($week_first_day == 7 && $day_number == 30) {
            // trường hợp có 6 tuần, tháng 30 ngày, ngày đầu tiên là chủ nhật
            $week_1 = array(null,null,null,null,null,null,1);
            $week_2 = array(2,3,4,5,6,7,8);
            $week_3 = array(9,10,11,12,13,14,15);
            $week_4 = array(16,17,18,19,20,21,22);
            $week_5 = array(23,24,25,26,27,28,29);
            $week_6 = array(30,null,null,null,null,null,null);

            $calendar = array($week_1,$week_2,$week_3,$week_4,$week_5,$week_6);
        } else if ($week_first_day == 7 && $day_number == 31) {
            // trường hợp có 6 tuần, tháng 31 ngày, ngày đầu tiên là chủ nhật
            $week_1 = array(null,null,null,null,null,null,1);
            $week_2 = array(2,3,4,5,6,7,8);
            $week_3 = array(9,10,11,12,13,14,15);
            $week_4 = array(16,17,18,19,20,21,22);
            $week_5 = array(23,24,25,26,27,28,29);
            $week_6 = array(30,31,null,null,null,null,null);

            $calendar = array($week_1,$week_2,$week_3,$week_4,$week_5,$week_6);
        } else if ($week_first_day == 6 && $day_number == 31) {
            // trường hợp có 6 tuần, tháng 31 ngày, ngày đầu tiên là thứ 7
            $week_1 = array(null,null,null,null,null,1,2);
            $week_2 = array(3,4,5,6,7,8,9);
            $week_3 = array(10,11,12,13,14,15,16);
            $week_4 = array(17,18,19,20,21,22,23);
            $week_5 = array(24,25,26,27,28,29,30);
            $week_6 = array(31,null,null,null,null,null,null);

            $calendar = array($week_1,$week_2,$week_3,$week_4,$week_5,$week_6);
        } else {
            // còn lại là có 5 tuần
            $week_1 = array();
            for ($i = 0; $i < $null_start_days; $i++) { 
                $week_1[] = null;
            }
            for ($i = 1; $i <= $days_in_end_of_first_week; $i++) { 
                $week_1[] = $i;
            }
            $week_2 = array();
            for ($i = 0; $i < 7; $i++) { 
                $week_2[] = $i + $days_in_end_of_first_week + 1;
            }
            $week_3 = array();
            for ($i = 0; $i < 7; $i++) { 
                $week_3[] = $i + $days_in_end_of_first_week + 1 + 7;
            }
            $week_4 = array();
            for ($i = 0; $i < 7; $i++) { 
                $week_4[] = $i + $days_in_end_of_first_week + 1 + 7 + 7;
            }
            $week_5 = array();
            for ($i = 0; $i < $days_in_start_of_final_week; $i++) { 
                $week_5[] = $i + $days_in_end_of_first_week + 1 + 7 + 7 + 7;
            }
            for ($i = 0; $i < $null_end_days; $i++) { 
                $week_5[] = null;
            }

            $week_6 = array();

            $calendar = array($week_1,$week_2,$week_3,$week_4,$week_5,$week_6);
        }

        return $calendar;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showCalendar()
    {
        // in ra lịch của tháng hiện tại
        // lấy ra ngày, tháng và năm hiện tại
        $today = date('d');
        $month = date('m');
        $year = date('o');
        $value = $year.'-'.$month;
        // các tuần có trong tháng hiện tại
        $calendar = $this->getWeekCalendar($month, $year);

        // lấy tất cả bản ghi trong tháng
            $all_times = array();
            for ($i=1; $i <=  $today; $i++) {
                if ($i < 10) {
                    $day = $year.'-'.$month.'-0'.$i;
                } else {
                    $day = $year.'-'.$month.'-'.$i;
                }
                $timekeeps = Timekeep::where('day',$day)->get();
                $all_times[] = $timekeeps;
            }
            $staffs = User::all();
            $off_list = array();
            
            foreach ($staffs as $staff) {
                $staff_off = array();
                $staff_off['user_id'] = $staff->user_id;
                $staff_off['name'] = $staff->name;
                $staff_off['numbers'] = 0;
                foreach ($all_times as $all_time) {
                    foreach ($all_time as $time) {
                        if ($time->user_id == $staff->user_id && $time->status == 'absent') {
                            $staff_off['numbers'] = $staff_off['numbers'] + 1;
                        }
                    }
                }
                $off_list[] = $staff_off;
            }

        return view('account.timekeeping.timekeep-month',
            compact('today', 'calendar', 'month', 'year', 'value', 'off_list'));
    }

    public function getCalendar(Request $request)
    {
        // dd($request->all()); exit();
        $value = $request->month;

        $year = explode('-', $request->month)[0];
        $month = explode('-', $request->month)[1];

        if ($month == date('m') && $year == date('o')) {
            $today = date('d');
        } else {
            $today = 0;
        }

        $calendar = $this->getWeekCalendar($month, $year);

        // nếu tháng cần tìm là tháng hiện tại
        if($month == date('m') && $year == date('o')) {
            $today =  date('d');
            // lấy tất cả bản ghi trong tháng
            $all_times = array();
            for ($i=1; $i <=  $today; $i++) {
                if ($i < 10) {
                    $day = $year.'-'.$month.'-0'.$i;
                } else {
                    $day = $year.'-'.$month.'-'.$i;
                }
                $timekeeps = Timekeep::where('day',$day)->get();
                $all_times[] = $timekeeps;
            }
            $staffs = User::all();
            $off_list = array();
            
            foreach ($staffs as $staff) {
                $staff_off = array();
                $staff_off['user_id'] = $staff->user_id;
                $staff_off['name'] = $staff->name;
                $staff_off['numbers'] = 0;
                foreach ($all_times as $all_time) {
                    foreach ($all_time as $time) {
                        if ($time->user_id == $staff->user_id && $time->status == 'absent') {
                            $staff_off['numbers'] = $staff_off['numbers'] + 1;
                        }
                    }
                }
                $off_list[] = $staff_off;
            }
        } else {
            // lấy ra số ngày trong tháng đó
            $day_number = cal_days_in_month(CAL_GREGORIAN, $month, $year);

            $staffs = User::all();
            $off_list = array();
            $all_times = array();
            for ($i=1; $i <=  $day_number; $i++) {
                if ($i < 10) {
                    $day = $year.'-'.$month.'-0'.$i;
                } else {
                    $day = $year.'-'.$month.'-'.$i;
                }
                $timekeeps = Timekeep::where('day',$day)->get();
                $all_times[] = $timekeeps;
            }

            foreach ($staffs as $staff) {
                $staff_off = array();
                $staff_off['user_id'] = $staff->user_id;
                $staff_off['name'] = $staff->name;
                $staff_off['numbers'] = 0;
                foreach ($all_times as $all_time) {
                    foreach ($all_time as $time) {
                        if ($time->user_id == $staff->user_id && $time->status == 'absent') {
                            $staff_off['numbers'] = $staff_off['numbers'] + 1;
                        }
                    }
                }
                $off_list[] = $staff_off;
            }
        }

        return view('account.timekeeping.timekeep-month',
            compact('today', 'calendar', 'month', 'year', 'value', 'off_list'));
    }

    public function getTimeDay($day, $month, $year)
    {
        // echo $day.'-'.$month.'-'.$year; exit();
        if ($day < 10) {
            $date = $year.'-'.$month.'-0'.$day;
        } else {
            $date = $year.'-'.$month.'-'.$day;
        }

        if ($month == date('m') && $year == date('o')) {
            $today = date('d');
        } else {
            $today = 0;
        }

        $timekeeps = Timekeep::where('day', $date)->get();
        $calendar = $this->getWeekCalendar($month, $year);
        $value = $year.'-'.$month;

        return view('account.timekeeping.timekeep-day',
            compact('day', 'today', 'calendar', 'month', 'year', 'value', 'timekeeps'));
    }
}
