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

class ManagerController extends Controller
{
    public function showVacationList()
    {
        $user = Auth::user();
        $unit = $user->unit;
        $vacations = Vacation::where([['unit', $unit],['status', 'waiting']])->get();

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
        $user = Auth::user();
        return view('user.manager.add-work-calendar', compact('user'));
    }

    public function addWorkCalendar(Request $request)
    {
        try {
            DB::beginTransaction();
            
            $rules = [
                'time' => ['required'],
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
                'time' => $request->time,
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

    public function showMultipleSearchForm()
    {
        $user = Auth::user();
        return view('user.manager.search.multiple-search', compact('user'));
    }

    public function showSearchByNameForm()
    {
        $user = Auth::user();
        return view('user.manager.search.search-by-name', compact('user'));
    }

    public function searchMultiple(Request $request)
    {
        $user = Auth::user();
        // duyệt các tìm trường kiếm, lấy ra các trường khác null
        $inputs = array();
        foreach ($request->all() as $key => $value) {
            // nếu trường khác rỗng thì lấy
            if ($value != null) {
                // nếu tên trường khác _token thì lấy
                if ($key != '_token') {
                    $inputs[$key] = $value;
                }
            }
        }
        // nếu có thông tin nhập vào thì kiểm tra trong cơ sở dữ liệu
        if ($inputs != null) {
            $staff_list = User::where($inputs)->get();
            $staffs = array();
            foreach ($staff_list as $staff) {
                if ($staff->unit == $user->unit) {
                    $staffs[] = $staff;
                }
            }
            // trả về kết quả  
            return view('user.manager.search.multiple-search-detail', compact('user', 'staffs'));
        } else {
            // nếu không có trường dữ liệu thì quay lại
            return redirect()->route('mana-multiple-search');
        }
    }

    public function searchByName(Request $request)
    {
        $user = Auth::user();
        $name = strtoupper($request->name);

        if ($name != null) {
            // lấy ra tất cả các user cùng đơn vị công tác
            $staff_list = User::where('unit', $user->unit)->get();

            $staffs = array();

            //so sánh chuỗi nhập với tên user để lấy kết quả
            foreach ($staff_list as $staff) {
                $staff_name = '$'.strtoupper($staff->name);
                $existName = strpos($staff_name, $name);
                if ($existName) {
                    $staffs[] = $staff;
                }
            }
            return view('user.manager.search.search-by-name-detail', compact('user', 'staffs'));
        } else {
            return redirect()->route('mana-search-by-name');
        }
    }

    public function showStaff()
    {
        // lấy ra đơn vị công tác và chi nhánh của manager
        $user = Auth::user();
        $unit = $user->unit;
        $branch = Unit::where('unit', $unit)->first()->branch;

        // lấy ra danh sách nhân viên cùng đơn vị của manager
        $staffs = User::where('unit', $unit)->get();

        return view('user.manager.staff-list.main', compact('user', 'unit', 'branch', 'staffs'));
    }

    public function showStaffDetail($user_id)
    {
        $user = Auth::user();
        $unit = $user->unit;
        $staff = User::where('user_id', $user_id)->first();
        $works = UserInfo::where('user_id', $user_id)->get();

        return view('user.manager.staff-list.detail', compact('user', 'unit', 'staff', 'works'));
    }
}
