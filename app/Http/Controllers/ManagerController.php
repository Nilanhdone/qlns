<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Model\Vacation;
use App\Model\User;
use App\Model\UserInfo;
use App\Model\Work;
use App\Model\Unit;
use App\Model\Time;

class ManagerController extends Controller
{
    public function showVacationList()
    {
        $heads = Unit::where('branch', 'head')->get();
        $obs = Unit::where('branch', 'ob')->get();
        $lbs = Unit::where('branch', 'lb')->get();
        $sbs = Unit::where('branch', 'sb')->get();
        $cbs = Unit::where('branch', 'cb')->get();
        $xbs = Unit::where('branch', 'xb')->get();

        $user = Auth::user()->unit;
        $vacations = Vacation::where([['unit', $unit],['status', 'waiting']])->get();

        $vacation_list = array();
        foreach ($vacations as $key => $vacation) {
            $user_name = User::where('user_id', $vacation->user_id)->first()->name;
            $array = array($vacation, $user_name);
            $vacation_list[] = $array;
        }
        
        return view('user.manager.vacation-list',
            compact('vacation_list', 'heads', 'obs', 'lbs', 'sbs', 'cbs', 'xbs'));  
    }

    public function accept($id)
    {
        $vacation = Vacation::where('id', $id)->first();
        $vacation->status = 'accepted';
        $vacation->save();

        return redirect()->back();
    }

    public function reject($id)
    {
        $vacation = Vacation::where('id', $id)->first();
        $vacation->status = 'rejected';
        $vacation->save();

        return redirect()->back();
    }

    public function showAddWorkCalendarForm()
    {
        return view('user.manager.add-work-calendar');
    }

    public function addWorkCalendar(Request $request)
    {
        try {
            DB::beginTransaction();
            
            $rules = [
                'start_day' => ['required'],
                'title' => ['required'],
                'description' => ['required'],
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $user_id = Auth::user()->user_id;
            $unit = Auth::user()->unit;

            Work::create([
                'user_id' => $user_id,
                'unit' => $unit,
                'start_day' => $request->start_day,
                'end_day' => $request->end_day,
                'title' => $request->title,
                'description' => $request->description,
            ]);

            DB::commit();

            return redirect()->back()->with('success', 'Create work calendar successfully!');
        } catch (Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error',$e->getMessage());
        }
    }

    public function showStaff()
    {
        // lấy ra đơn vị công tác và chi nhánh của manager
        $unit = Auth::user()->unit;
        $branch = Unit::where('unit', $unit)->first()->branch;

        // lấy ra danh sách nhân viên cùng đơn vị của manager
        $staffs = User::where([['unit', $unit], ['status', 1]])->get();

        return view('user.manager.staff-list.main', compact('unit', 'branch', 'staffs'));
    }

    public function showStaffDetail($user_id)
    {
        $unit = Auth::user()->unit;
        $staff = User::where('user_id', $user_id)->first();
        $works = UserInfo::where('user_id', $user_id)->get();

        return view('user.manager.staff-list.detail', compact('unit', 'staff', 'works'));
    }

    public function showTimekeeping()
    {
        // lấy ra đơn vị công tác và chi nhánh của manager
        $unit = Auth::user()->unit;
        $branch = Unit::where('unit', $unit)->first()->branch;

        // lấy ra danh sách nhân viên cùng đơn vị của manager
        $staffs = User::where([['unit', $unit], ['status', 1]])->get();

        $today = date('Y-m-d');

        $time = Time::where([['date',$today],['unit',$unit]])->get();

        if (count($time) == 0) {
            foreach ($staffs as $staff) {
                Time::create([
                    'user_id' => $staff->user_id,
                    'unit' => $unit,
                    'date' => $today,
                    'status' => 'not',
                ]);
            }
        }

        $timekeeps = Time::where([['date',$today],['unit',$unit]])->get();
        foreach ($staffs as $staff) {
            foreach ($timekeeps as $timekeep) {
                $timekeep['name'] = $staff->name;
                $timekeep['avatar'] = $staff->avatar;
            }
        }

        return view('user.manager.timekeeping', compact('unit', 'branch', 'timekeeps'));  
    }

    public function timeYes($id)
    {
        $today = date('Y-m-d');
        $time = Time::where([['date',$today],['user_id',$id]])->first();
        $time->status = 'yes';
        $time->save();
        return redirect()->back();
    }

    public function timeNo($id)
    {
        $today = date('Y-m-d');
        $time = Time::where([['date',$today],['user_id',$id]])->first();
        $time->status = 'no';
        $time->save();

        return redirect()->back();
    }

    public function changeTimeStatus($id)
    {
        $today = date('Y-m-d');
        $time = Time::where([['date',$today],['user_id',$id]])->first();
        $time->status = 'not';
        $time->save();

        return redirect()->back();
    }

    public function showTimekeepingSearch()
    {
        $unit = Auth::user()->unit;
        $branch = Unit::where('unit', $unit)->first()->branch;

        $today =  date('d');
        $month = date('m');
        $year = date('Y');

        return view('user.manager.timekeeping-search', compact('unit', 'branch', 'today', 'month', 'year'));
    }

    public function daySearch(Request $request)
    {
        $unit = Auth::user()->unit;
        $branch = Unit::where('unit', $unit)->first()->branch;

        $today =  date('d');
        $month = date('m');
        $year = date('Y');
        if ($request->day < 10) {
            $day = $year.'-'.$month.'-0'.$request->day;
        } else {
            $day = $year.'-'.$month.'-'.$request->day;
        }

        $staffs = User::where([['unit', $unit], ['status', 1]])->get();
        $timekeeps = Time::where([['date',$day],['unit',$unit]])->get();

        foreach ($staffs as $staff) {
            foreach ($timekeeps as $timekeep) {
                if ($timekeep->user_id == $staff->user_id) {
                    $timekeep['name'] = $staff->name; 
                }
            }
        }

        // dd($timekeeps); exit();

        return view('user.manager.search-day',
            compact('unit', 'branch', 'today', 'month', 'year', 'day','timekeeps'));
    }

    public function monthSearch(Request $request)
    {
        $unit = Auth::user()->unit;
        $branch = Unit::where('unit', $unit)->first()->branch;

        $today =  date('d');
        $month = date('m');
        $year = date('Y');

        $month_search = $request->month.'-'.$year = date('Y');

        // nếu tháng cần tìm là tháng hiện tại
        if($request->month == $month) {
            // lấy tất cả bản ghi trong tháng
            $all_times = array();
            for ($i=1; $i <=  $today; $i++) {
                if ($i < 10) {
                    $day = $year.'-'.$month.'-0'.$i;
                } else {
                    $day = $year.'-'.$month.'-'.$i;
                }
                $timekeeps = Time::where([['date',$day],['unit',$unit]])->get();
                $all_times[] = $timekeeps;
            }

            $staffs = User::where([['unit', $unit], ['status', 1]])->get();
            $off_list = array();
            
            foreach ($staffs as $staff) {
                $staff_off = array();
                $staff_off['name'] = $staff->name;
                $staff_off['numbers'] = 0;
                foreach ($all_times as $all_time) {
                    foreach ($all_time as $time) {
                        if ($time->user_id == $staff->user_id && $time->status == 'no') {
                            $staff_off['numbers'] = $staff_off['numbers'] + 1;
                        }
                    }
                }
            }
            $off_list[] = $staff_off;
        } else {
            // lấy ra số ngày trong tháng đó
            $day_number = cal_days_in_month(CAL_GREGORIAN, $request->month, $year);

            if ($request->month < 10) {
                $thisMonth = '0'.$request->month;
            } else {
                $thisMonth = $request->month;
            }

            $staffs = User::where([['unit', $unit], ['status', 1]])->get();
            $off_list = array();
            $all_times = array();
            for ($i=1; $i <=  $day_number; $i++) {
                if ($i < 10) {
                    $day = $year.'-'.$thisMonth.'-0'.$i;
                } else {
                    $day = $year.'-'.$thisMonth.'-'.$i;
                }
                $timekeeps = Time::where([['date',$day],['unit',$unit]])->get();
                $all_times[] = $timekeeps;
            }

            foreach ($staffs as $staff) {
                $staff_off = array();
                $staff_off['name'] = $staff->name;
                $staff_off['numbers'] = 0;
                foreach ($all_times as $all_time) {
                    foreach ($all_time as $time) {
                        if ($time->user_id == $staff->user_id && $time->status == 'no') {
                            $staff_off['numbers'] = $staff_off['numbers'] + 1;
                        }
                    }
                }
            }
            $off_list[] = $staff_off;
        }

        return view('user.manager.search-month',
            compact('unit', 'branch', 'today', 'month', 'year', 'month_search', 'off_list'));
    }
}
