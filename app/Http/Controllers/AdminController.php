<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\UserInfo;
use App\Model\User;
use App\Model\Unit;
use App\Model\Position;
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
    public function showUpdateForm($id)
    {
        $user = Auth::user();
        $user_id = $id;
        $work_unit = User::where('user_id', $user_id)->first()->work_unit;
        $units = Unit::all();
        $positions = Position::all();
        return view('user.admin.update', compact('user', 'user_id', 'work_unit', 'units', 'positions'));
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
                'user_id' => ['required'],
                'start_day' => ['required'],
                'salary' => ['required', 'regex:/[0-9]/'],
                'insurance_number' => ['required', 'string'],
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $user_info = UserInfo::where('end_day', null)->first();
            $user_info->end_day = $request->start_day;
            $user_info->save();

            UserInfo::create([
                'user_id' => $request->user_id,
                'department' => $request->department,
                'work_unit' => $request->work_unit,
                'position' => $request->position,
                'start_day' => $request->start_day,
                'end_day' => $request->end_day,
                'salary' => $request->salary,
                'insurance_number' => $request->insurance_number,
            ]);

            DB::commit();

            return redirect()->back()->with('success', 'Cập nhật thông tin thành công!');
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
    public function showStaff()
    {
        $user = Auth::user();
        $departments = Unit::where('department', 'departments')->get();
        $equivalent_departments = Unit::where('department', 'equivalent-departments')->get();
        $bol_branches = Unit::where('department', 'bol-branches')->get();
        $ED_under_BOLs = Unit::where('department', 'ED-under-BOL')->get();

        return view('user.admin.staff-list.main', compact('user', 'departments', 'equivalent_departments', 'bol_branches', 'ED_under_BOLs'));
    }

    /**
     * Show staff list of unit.
     *
     * @param $unit
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showUnitDetail($unit = null)
    {
        $user = Auth::user();
        $departments = Unit::where('department', 'departments')->get();
        $equivalent_departments = Unit::where('department', 'equivalent-departments')->get();
        $bol_branches = Unit::where('department', 'bol-branches')->get();
        $ED_under_BOLs = Unit::where('department', 'ED-under-BOL')->get();
        $lists = UserInfo::where('work_unit', $unit)->get();
        $staffs = array();
        foreach ($lists as $list) {
            $staff = User::where('user_id', $list->user_id)->first();
            $staffs[] = $staff;
        }

        return view('user.admin.staff-list.detail', compact('user', 'staffs', 'lists', 'unit','departments', 'equivalent_departments', 'bol_branches', 'ED_under_BOLs'));
    }

    /**
     * Show staff detail information.
     *
     * @param $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showStaffDetail($id)
    {
        $user = Auth::user();
        $staff = User::where('user_id', $id)->first();
        $works = UserInfo::where('user_id', $id)->get();

        return view('user.admin.detail', compact('user', 'staff', 'works'));
    }

    /**
     * Show form to edit basic information.
     *
     * @param $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showEditBasicForm($id)
    {
        $user = Auth::user();
        $staff = User::where('user_id', $id)->first();

        return view('user.admin.edit-basic', compact('user', 'staff'));
    }

    /**
     * Show form to edit work process.
     *
     * @param $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showEditWorkForm($id)
    {
        $user = Auth::user();
        return view('user.admin.edit-work', compact('user'));
    }

    public function editBasic(Request $request)
    {

    }

    public function editWork(Request $request)
    {
        
    }

    public function delete($id)
    {
        
    }
}
