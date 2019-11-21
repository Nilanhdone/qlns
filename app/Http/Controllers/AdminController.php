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
use Illuminate\Http\UploadedFile;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Hash;
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
        $unit = User::where('user_id', $user_id)->first()->unit;
        $units = Unit::all();
        $positions = Position::all();
        return view('user.admin.update', compact('user', 'user_id', 'unit', 'units', 'positions'));
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
                'branch' => $request->branch,
                'unit' => $request->unit,
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
        // lấy ra danh sách đơn vị làm việc để hiển thị ở sidebar
        $user = Auth::user();
        $heads = Unit::where('branch', 'head')->get();
        $obs = Unit::where('branch', 'ob')->get();
        $lbs = Unit::where('branch', 'lb')->get();
        $sbs = Unit::where('branch', 'sb')->get();
        $cbs = Unit::where('branch', 'cb')->get();
        $xbs = Unit::where('branch', 'xb')->get();

        return view('user.admin.staff-list.main', compact('user', 'heads', 'obs', 'lbs', 'sbs', 'cbs', 'xbs'));
    }

    /**
     * Show staff list of unit.
     *
     * @param $unit
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showUnitDetail($unit = null)
    {
        // lấy ra danh sách đơn vị làm việc để hiển thị ở sidebar
        $user = Auth::user();
        $heads = Unit::where('branch', 'head')->get();
        $obs = Unit::where('branch', 'ob')->get();
        $lbs = Unit::where('branch', 'lb')->get();
        $sbs = Unit::where('branch', 'sb')->get();
        $cbs = Unit::where('branch', 'cb')->get();
        $xbs = Unit::where('branch', 'xb')->get();

        $branch = Unit::where('unit', $unit)->first()->branch;

        // lấy ra danh sách nhân viên ứng với $unit
        $lists = UserInfo::where('unit', $unit)->get();
        $staffs = array();
        foreach ($lists as $list) {
            $staff = User::where('user_id', $list->user_id)->first();
            if ($staff->status == 1) {
                $staffs[] = $staff;
            }
        }

        return view('user.admin.staff-list.detail', compact('user', 'staffs', 'lists', 'branch' ,'unit', 'heads', 'obs', 'lbs', 'sbs', 'cbs', 'xbs'));
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
        try {
            DB::beginTransaction();

            $rules = [
                'user_id' => ['required'],
                'name' => ['required', 'string', 'max:255'],
                'birthday' => ['required'],
                'identify_number' => ['required', 'string', 'max:255'],
                'nationality' => ['required', 'string', 'max:255'],
                'religion' => ['required', 'string', 'max:255'],
                'hometown' => ['required', 'string', 'max:255'],
                'address' => ['required', 'string', 'max:255'],
                'phone' => ['required', 'string', 'regex:/[0-9]/', 'min:10', 'max:11'],
                'email' => ['required'],
            ];
            
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            // dd($request->all()); exit();
            // lấy ra user cần chỉnh sửa
            $user = User::where('user_id', $request->user_id)->first();

            // cập nhật dữ liệu đã chỉnh sửa
            $user->name = $request->name;

            // nếu đổi ảnh đại diện thì lưu lại
            if ($request->hasFile('image')) {
                $image = $request->image;
                $avatar = time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('\img\avatar');
                $image->move($destinationPath, $avatar);

                $user->avatar = $request->avatar;
            }
            $user->gender = $request->gender;
            $user->birthday = $request->birthday;
            $user->identify_number = $request->identify_number;
            $user->nationality = $request->nationality;
            $user->religion = $request->religion;
            $user->hometown = $request->hometown;
            $user->address = $request->address;
            $user->phone = $request->phone;
            $user->degree = $request->degree;
            $user->role = $request->role;

            // lưu các thay đổi
            $user->save();

            DB::commit();

            return redirect()->back()->with('success', 'Successfull');
        } catch (Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('errors', $e->getMessage());
        }
    }

    public function editWork(Request $request)
    {
        
    }

    public function delete($id)
    {
        $status = 0;
        $user = User::where('user_id', $id)->first();
        $user->status = $status;
        $user->save();

        return redirect()->back();
    }
}
