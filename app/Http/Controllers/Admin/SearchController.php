<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\User;
use App\Model\Unit;
use App\Model\Position;
use App\Model\Education;
use App\Model\Training;
use App\Model\Company;
use App\Model\Government;
use App\Model\Party;
use App\Model\Family;
use App\Model\Foreigner;
use App\Model\Laudatory;
use App\Model\Infringe;
use Auth;
use Session;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SearchController extends Controller
{
    public function showSearchForm()
    {
        $units = Unit::all();
        $positions = Position::all();
        return view('account.search.search', compact('units', 'positions'));
    }

    public function search(Request $request)
    {
        $units = Unit::all();
        $positions = Position::all();
        $staffs = array();

        // kiểm tra số hiệu nhân viên
        if ($request->user_id != null) {
            $users = User::where('user_id', $request->user_id)->first();
            return view('account.search.result', compact('users', 'staffs', 'units', 'positions'));
        }

        // kiểm tra giới tính
        if ($request->gender == 'both') {
            $users = User::all();
        } else if ($request->gender == 'male') {
            $users = User::where('gender', 'male')->get();
        } else if ($request->gender == 'female') {
            $users = User::where('gender', 'female')->get();
        }

        // kiểm tra đơn vị công tác
        if ($request->unit != null) {
            $users = $users->where('unit', $request->unit);
        }

        // kiểm tra chức vụ
        if ($request->position != null) {
            $users = $users->where('position', $request->position);
        }

        // kiểm tra tên
        if ($request->name != null) {
            //so sánh chuỗi nhập với tên user để lấy kết quả
            foreach ($users as $staff) {
                $staff_name = '$'.strtoupper($staff->name);
                $existName = strpos($staff_name, $name);
                if ($existName) {
                    $staffs[] = $staff;
                }
            }
        }

        return view('account.search.result', compact('users', 'staffs', 'units', 'positions'));
    }
}
