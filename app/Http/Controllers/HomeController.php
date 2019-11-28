<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Model\Vacation;
use App\Model\UserInfo;
use App\Model\Work;
use App;
use session;
use Auth;
use DateTime;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $works = UserInfo::where('user_id', $user->user_id)->get();
        $vacations = Vacation::where('user_id', $user->user_id)->get();
        $work_calendars = Work::where('unit', $user->unit)->get();
        $month_works = array();
        foreach ($work_calendars as $value) {
            if (explode('-', $value->time)[0] == date('o') && explode('-', $value->time)[1] == date('m') )
            $month_works[] = $value;
        }

        // in ra lịch của tháng hiện tại
        // lấy ra ngày, tháng và năm hiện tại
        $today = date('d'); // 27
        $current_month = date('m'); // 11
        $current_year = date('o'); // 2019
        // chọn ngày đầu tiên của tháng đó
        $first_day = new DateTime();
        $first_day->setDate($current_year, $current_month, 1); //2019 - 11 - 1
        // lấy ra số ngày trong tháng
        $day_number = cal_days_in_month(CAL_GREGORIAN, $current_month, $current_year); // 30

        // lấy thứ của ngày đầu tiên
        $week_first_day = $first_day->format('N'); // 5 - thứ 6 (1 -7)
        // lấy chênh lệch đầu tháng
        $null_start_days = $week_first_day - 1; // 4 - trống 4 ngày ở đầu
        // số ngày cuối cùng của tuần đầu tiên
        $days_in_end_of_first_week = 7- $null_start_days; // 3
        // lấy chênh lệch cuối tháng
        if ($day_number == 28) {
            $null_end_days = 7 - $null_start_days; // 3
        } else if ($day_number == 29) {
            $null_end_days = abs(6 - $null_start_days); // 2
        } else if ($day_number == 30) {
            $null_end_days = abs(5 - $null_start_days); // 1
        } else if ($day_number == 31) {
            $null_end_days = abs(4 - $null_start_days); // 0
        }

        // số ngày đầu tiên của tuần cuối cùng
        $days_in_start_of_final_week = 7 - $null_end_days; // 6

        // lấy số tuần
        if ($week_first_day == 1 && $day_number == 28) {
            $week_number = 4;
            $week_1 = array(1,2,3,4,5,6,7);
            $week_2 = array(8,9,10,11,12,13,14);
            $week_3 = array(15,16,17,18,19,20,21);
            $week_4 = array(22,23,24,25,26,27,28);
            $week_5 = array();
            $calendar = array($week_1,$week_2,$week_3,$week_4,$week_5);
        } else {
            $week_number = 5;
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

            $calendar = array($week_1,$week_2,$week_3,$week_4,$week_5);
        }
        $now_day = $today.' - '.$current_month.' - '.$current_year;
        // return view('calendar', compact('week_1', 'week_2', 'week_3', 'week_4', 'week_5'));
        return view('home', compact('today', 'calendar', 'now_day' , 'user', 'works', 'vacations', 'month_works'));
    }

    /**
     * Show profile view.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showProfile()
    {
        return redirect()->route('home');
    }

    /**
     * Show form to change password.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showChangePasswordForm()
    {
        $user = Auth::user();
        return view('user.change-password', compact('user'));
    }

    /**
     * Check to change password.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function changePassword(Request $request)
    {
        try {
            DB::beginTransaction();
            
            $rules = [
                'old_password' => ['required', 'string', 'min:6'],
                'new_password' => ['required', 'string', 'min:6'],
                'repassword' => ['required', 'string', 'min:6', 'same:new_password'],
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            // lấy ra người dùng hiện tại
            $user = Auth::user();
            // kiểm tra nếu mật khẩu hiện tại không đúng
            if (!Hash::check($request->old_password, $user->password)) {
                // in ra lỗi
                $errors = "Current password is incorrect!";
                return redirect()->back()->withErrors($errors)->withInput();
            }

            // lưu mật khẩu mới
            $user->password = Hash::make($request->new_password);
            $user->save();

            DB::commit();

            return redirect()->back()->with('success', 'Change password successfully!');
        } catch (Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error',$e->getMessage());
        }
    }

    public function getCalendar()
    {

    }
}
