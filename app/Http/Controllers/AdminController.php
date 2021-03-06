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

        // show list work unit
        $heads = Unit::where('branch', 'head')->get();
        $obs = Unit::where('branch', 'ob')->get();
        $lbs = Unit::where('branch', 'lb')->get();
        $sbs = Unit::where('branch', 'sb')->get();
        $cbs = Unit::where('branch', 'cb')->get();
        $xbs = Unit::where('branch', 'xb')->get();

        $units = Unit::all();
        $positions = Position::all();

        return view('user.admin.staff.update',
            compact('user', 'user_id', 'units', 'positions', 'heads', 'obs', 'lbs', 'sbs', 'cbs', 'xbs'));
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

            // lưu ngày kết thúc ở quá trình trước bằng ngày bắt đầu ở quá trình sau
            $user_info = UserInfo::where('end_day', null)->first();

            //so sánh thời gian trước khi lưu
            if ($user_info->start_day > $request->start_day) {
                return redirect()->back()->with('fault', 'Invalid date!');
            }
            $user_info->end_day = $request->start_day;
            $user_info->save();

            UserInfo::create([
                'user_id' => $request->user_id,
                'branch' => explode('-', $request->unit)[0], // tách chuỗi từ unit để lấy branch
                'unit' => $request->unit,
                'position' => $request->position,
                'start_day' => $request->start_day,
                'end_day' => $request->end_day,
                'salary' => $request->salary,
                'insurance_number' => $request->insurance_number,
            ]);

            $user_id = $user_info->user_id;
            $user = User::where('user_id', $user_id)->first();
            $user->unit = $request->unit;
            $user->position = $request->position;
            $user->save();

            DB::commit();

            return redirect()->back()->with('success', 'Update information successfully!');
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

        return view('user.admin.staff-list.main',
            compact('user', 'heads', 'obs', 'lbs', 'sbs', 'cbs', 'xbs'));
    }

    /**
     * Show staff list of unit.
     *
     * @param $unit
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showUnitDetail($unit)
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
        $staffs = User::where('unit', $unit)->get();

        return view('user.admin.staff-list.detail',
            compact('user', 'staffs', 'branch' ,'unit', 'heads', 'obs', 'lbs', 'sbs', 'cbs', 'xbs'));
    }

    /**
     * Show staff detail information.
     *
     * @param $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showStaffDetail($id)
    {
        $heads = Unit::where('branch', 'head')->get();
        $obs = Unit::where('branch', 'ob')->get();
        $lbs = Unit::where('branch', 'lb')->get();
        $sbs = Unit::where('branch', 'sb')->get();
        $cbs = Unit::where('branch', 'cb')->get();
        $xbs = Unit::where('branch', 'xb')->get();

        $staff = User::where('user_id', $id)->first();
        $works = UserInfo::where('user_id', $id)->get();

        return view('user.admin.staff.detail',
            compact('staff', 'works', 'heads', 'obs', 'lbs', 'sbs', 'cbs', 'xbs'));
    }

    /**
     * Show form to edit basic information.
     *
     * @param $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showEditBasicForm($id)
    {
        $heads = Unit::where('branch', 'head')->get();
        $obs = Unit::where('branch', 'ob')->get();
        $lbs = Unit::where('branch', 'lb')->get();
        $sbs = Unit::where('branch', 'sb')->get();
        $cbs = Unit::where('branch', 'cb')->get();
        $xbs = Unit::where('branch', 'xb')->get();

        $staff = User::where('user_id', $id)->first();

        return view('user.admin.staff.edit-basic',
            compact('staff', 'heads', 'obs', 'lbs', 'sbs', 'cbs', 'xbs'));
    }

    /**
     * Show form to edit work process.
     *
     * @param $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showEditWorkForm($user_id)
    {
        $heads = Unit::where('branch', 'head')->get();
        $obs = Unit::where('branch', 'ob')->get();
        $lbs = Unit::where('branch', 'lb')->get();
        $sbs = Unit::where('branch', 'sb')->get();
        $cbs = Unit::where('branch', 'cb')->get();
        $xbs = Unit::where('branch', 'xb')->get();

        $unit = User::where('user_id', $user_id)->first()->unit;
        $works = UserInfo::where('user_id', $user_id)->get();
        return view('user.admin.staff.edit-work',
            compact('unit', 'works', 'heads', 'obs', 'lbs', 'sbs', 'cbs', 'xbs'));
    }

    /**
     * Show form to edit work process.
     *
     * @param $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showEditWorkDetailForm($user_id, $id)
    {
        $heads = Unit::where('branch', 'head')->get();
        $obs = Unit::where('branch', 'ob')->get();
        $lbs = Unit::where('branch', 'lb')->get();
        $sbs = Unit::where('branch', 'sb')->get();
        $cbs = Unit::where('branch', 'cb')->get();
        $xbs = Unit::where('branch', 'xb')->get();

        $work = UserInfo::where([['user_id', $user_id], ['id', $id]])->first();
        $units = Unit::all();
        $positions = Position::all();

        return view('user.admin.staff.edit-work-detail',
            compact('user', 'work', 'units', 'positions', 'heads', 'obs', 'lbs', 'sbs', 'cbs', 'xbs'));
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
        try {
            DB::beginTransaction();
            
            $rules = [
                'id' => ['required'],
                'user_id' => ['required'],
                'start_day' => ['required'],
                'salary' => ['required', 'regex:/[0-9]/'],
                'insurance_number' => ['required', 'string'],
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            //so sánh thời gian trước khi lưu
            if ($request->end_day != null && $request->end_day < $request->start_day) {
                return redirect()->back()->with('fault', 'Invalid date!');
            }

            $user_info = UserInfo::where('id', $request->id)->first();
            $user_info->unit = $request->unit;
            $user_info->position = $request->position;
            $user_info->start_day = $request->start_day;
            $user_info->end_day = $request->end_day;
            $user_info->salary = $request->salary;
            $user_info->insurance_number = $request->insurance_number;
            $user_info->save();

            $user_id = $user_info->user_id;
            $user = User::where('user_id', $user_id)->first();
            $user->unit = $request->unit;
            $user->position = $request->position;
            $user->save();

            DB::commit();

            return redirect()->back()->with('success', 'Edit work process successfully!');
        } catch (Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error',$e->getMessage());
        }
    }

    public function delete($id)
    {
        // chuyển trường status của người dùng sang 0
        $status = 0;
        $user = User::where('user_id', $id)->first();
        $user->status = $status;
        $user->save();

        return redirect()->back();
    }

    public function restore($id)
    {
        // chuyển trường status của người dùng sang 1
        $status = 1;
        $user = User::where('user_id', $id)->first();
        $user->status = $status;
        $user->save();

        return redirect()->back();
    }

    public function showMultipleSearchForm()
    {
        $user = Auth::user();

        $heads = Unit::where('branch', 'head')->get();
        $obs = Unit::where('branch', 'ob')->get();
        $lbs = Unit::where('branch', 'lb')->get();
        $sbs = Unit::where('branch', 'sb')->get();
        $cbs = Unit::where('branch', 'cb')->get();
        $xbs = Unit::where('branch', 'xb')->get();

        $units = Unit::all();
        return view('user.admin.search.multiple-search',
            compact('user', 'units', 'heads', 'obs', 'lbs', 'sbs', 'cbs', 'xbs'));
    }

    public function showSearchByNameForm()
    {
        $user = Auth::user();

        $heads = Unit::where('branch', 'head')->get();
        $obs = Unit::where('branch', 'ob')->get();
        $lbs = Unit::where('branch', 'lb')->get();
        $sbs = Unit::where('branch', 'sb')->get();
        $cbs = Unit::where('branch', 'cb')->get();
        $xbs = Unit::where('branch', 'xb')->get();

        return view('user.admin.search.search-by-name',
            compact('user', 'heads', 'obs', 'lbs', 'sbs', 'cbs', 'xbs'));
    }

    public function searchMultiple(Request $request)
    {
        $user = Auth::user();

        $heads = Unit::where('branch', 'head')->get();
        $obs = Unit::where('branch', 'ob')->get();
        $lbs = Unit::where('branch', 'lb')->get();
        $sbs = Unit::where('branch', 'sb')->get();
        $cbs = Unit::where('branch', 'cb')->get();
        $xbs = Unit::where('branch', 'xb')->get();

        $units = Unit::all();
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
        if ($inputs != null) {
            $staffs = User::where($inputs)->get();           
            return view('user.admin.search.multiple-search-detail', compact('user', 'staffs', 'units', 'heads', 'obs', 'lbs', 'sbs', 'cbs', 'xbs'));
        } else {
            return redirect()->route('multiple-search');
        }
    }

    public function searchByName(Request $request)
    {
        $user = Auth::user();

        $heads = Unit::where('branch', 'head')->get();
        $obs = Unit::where('branch', 'ob')->get();
        $lbs = Unit::where('branch', 'lb')->get();
        $sbs = Unit::where('branch', 'sb')->get();
        $cbs = Unit::where('branch', 'cb')->get();
        $xbs = Unit::where('branch', 'xb')->get();

        $name = strtoupper($request->name);

        if ($name != null) {
            // lấy ra tất cả các user
            $staff_list = User::all();

            $staffs = array();

            //so sánh chuỗi nhập với tên user để lấy kết quả
            foreach ($staff_list as $staff) {
                $staff_name = '$'.strtoupper($staff->name);
                $existName = strpos($staff_name, $name);
                if ($existName) {
                    $staffs[] = $staff;
                }
            }
            return view('user.admin.search.search-by-name-detail', compact('user', 'staffs', 'heads', 'obs', 'lbs', 'sbs', 'cbs', 'xbs'));
        } else {
            return redirect()->route('search-by-name');
        }
    }
}
