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
        // $this->middleware('auth');
    }

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

    private function getWorkCalendar($work_calendars)
    {
        $aday_works = array();
        $days_works = array();
        foreach ($work_calendars as $value) {
            if ($value->end_day == null) {
                // công việc chỉ trong 1 ngày
                if (explode('-', $value->start_day)[0] == date('o')
                && explode('-', explode('-', $value->start_day)[1])[0] == date('m')) {
                    // công việc chỉ trong tháng hiện tại
                    $aday_works[] = $value;
                }
            } else {
                // công việc kéo dài trong nhiều ngày
                if (explode('-', $value->start_day)[0] == date('o')
                && explode('-', explode('-', $value->start_day)[1])[0] == date('m')
                && explode('-', $value->end_day)[0] == date('o')
                && explode('-', explode('-', $value->end_day)[1])[0] == date('m')) {
                    // công việc chỉ trong tháng hiện tại
                    $days_works[] = $value;
                }
            }
        }
        // trả về kết quả lọc công việc theo tháng hiện tại
        return array($aday_works, $days_works);
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $units = Unit::all();
        $positions = Position::all();
        return view('account.create.create-account', compact('units', 'positions'));
        exit();
        // $user = Auth::user();
        // $month_works = $this->getWorkCalendar($work_calendars);
        // $aday_works = $month_works[0];
        // $days_works = $month_works[1];

        // in ra lịch của tháng hiện tại
        // lấy ra ngày, tháng và năm hiện tại
        $today = date('d');
        $current_month = date('m');
        $current_year = date('o');
        // các tuần có trong tháng hiện tại
        $calendar = $this->getWeekCalendar($current_month, $current_year);
        $now_day = $today.' - '.$current_month.' - '.$current_year;
        return view('home',
            compact('today', 'calendar', 'now_day' , 'user'));
    }

    /**
     * Show profile view.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showProfile()
    {
        // show list work unit
        $heads = Unit::where('branch', 'head')->get();
        $obs = Unit::where('branch', 'ob')->get();
        $lbs = Unit::where('branch', 'lb')->get();
        $sbs = Unit::where('branch', 'sb')->get();
        $cbs = Unit::where('branch', 'cb')->get();
        $xbs = Unit::where('branch', 'xb')->get();

        $user = Auth::user();
        $works = UserInfo::where('user_id', $user->user_id)->get();

        return view('user.profile.profile', compact('user', 'works', 'heads', 'obs', 'lbs', 'sbs', 'cbs', 'xbs'));
    }

    /**
     * Show form to change password.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showChangePasswordForm()
    {
        // show list work unit
        $heads = Unit::where('branch', 'head')->get();
        $obs = Unit::where('branch', 'ob')->get();
        $lbs = Unit::where('branch', 'lb')->get();
        $sbs = Unit::where('branch', 'sb')->get();
        $cbs = Unit::where('branch', 'cb')->get();
        $xbs = Unit::where('branch', 'xb')->get();

        return view('user.change-password', compact('user', 'heads', 'obs', 'lbs', 'sbs', 'cbs', 'xbs'));
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
