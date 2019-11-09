<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\UserInfo;
use App\Model\User;
use App\Model\Unit;
use Auth;
use Session;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    /**
     * Show update form.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showUpdateForm() {
        $user = Auth::user();
        return view('user.admin.update', compact('user'));
    }

    /**
     * update user information.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update(Request $request)
    {
        try {
            DB::beginTransaction();
            
            $rules = [
                'start_day' => ['required'],
                'salary' => ['required', 'regex:/[0-9]/'],
                'insurance_number' => ['required', 'string'],
            ];

            $validator = Validator::make($request->get(), $rules);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            UserInfo::create([
                'user_id' => 20190001,
                'status' => $request->status,
                'position' => $request->position,
                'department' => $request->department,
                'work_unit' => $request->work_unit,
                'start_day' => $request->start_day,
                'end_day' => $request->end_day,
                'salary' => $request->salary,
                'insurance_number' => $request->insurance_number,
            ]);

            DB::commit();
            
        } catch (Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error',$e->getMessage());
        }
    }

    /**
     * Show staff list.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showStaff() {
        $user = Auth::user();
        $departments = Unit::where('department', 'departments')->get();
        $equivalent_departments = Unit::where('department', 'equivalent-departments')->get();
        $bol_branches = Unit::where('department', 'bol-branches')->get();
        $ED_under_BOLs = Unit::where('department', 'ED-under-BOL')->get();

        return view('user.admin.staff-list.main', compact('user', 'departments', 'equivalent_departments', 'bol_branches', 'ED_under_BOLs'));
    }

    /**
     * Show staff detail information.
     *
     * @param $unit
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showStaffDetail($unit) {
        $user = Auth::user();
        $departments = Unit::where('department', 'departments')->get();
        $equivalent_departments = Unit::where('department', 'equivalent-departments')->get();
        $bol_branches = Unit::where('department', 'bol-branches')->get();
        $ED_under_BOLs = Unit::where('department', 'ED-under-BOL')->get();
        $lists = UserInfo::where('work_unit', $unit)->get();
        $users = array();
        foreach ($lists as $list) {
            $user = User::where('user_id', $list->user_id)->first();
            $users[] = $user;
        }
        // dd($users);
        return view('user.admin.staff-list.detail', compact('user', 'users', 'lists', 'unit','departments', 'equivalent_departments', 'bol_branches', 'ED_under_BOLs'));
    }
}
