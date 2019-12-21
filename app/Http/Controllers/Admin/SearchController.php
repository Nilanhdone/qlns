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

        $male = 0;
        $female = 0;

        // kiểm tra số hiệu nhân viên
        if ($request->user_id != null) {
            $users = User::where([['user_id', $request->user_id], ['status', 'new']])->get();

            foreach ($users as $user) {
                if ($user->gender == 'male') {
                    $male++;
                } elseif ($user->gender == 'female') {
                    $female++;
                }
            }

            return view('account.search.result', compact('users', 'units', 'positions'));
        }

        // kiểm tra giới tính
        if ($request->gender == 'both') {
            $users = User::where('status', 'new')->orderBy('name')->get();
        } else if ($request->gender == 'male') {
            $users = User::where([['gender', 'male'], ['status', 'new']])->get();
        } else if ($request->gender == 'female') {
            $users = User::where([['gender', 'female'], ['status', 'new']])->get();
        }

        // kiểm tra đơn vị công tác
        if ($request->unit != null) {
            $users = $users->where('unit', $request->unit);
        }

        // kiểm tra chức vụ
        if ($request->position != null) {
            $users = $users->where('position', $request->position);
        }

        // kiểm tra trình độ
        if ($request->degree != null) {
            $users = $users->where('degree', $request->degree);
        }

        if ($request->agefrom != null && $request->ageto == null) {
            $time =  mktime(0,0,0, date('m'), date('d'), (date('Y') - $request->agefrom));
            $age = date('Y-m-d', $time);
            $users = $users->where('birthday', '<=', $age);
        } else if ($request->agefrom == null && $request->ageto != null) {
            $time =  mktime(0,0,0, date('m'), date('d'), (date('Y') - $request->ageto));
            $age = date('Y-m-d', $time);
            $users = $users->where('birthday', '>=', $age);
        } else if ($request->agefrom != null && $request->ageto != null) {
            $time =  mktime(0,0,0, date('m'), date('d'), (date('Y') - $request->agefrom));
            $age = date('Y-m-d', $time);
            $users = $users->where('birthday', '<=', $age);
            $time =  mktime(0,0,0, date('m'), date('d'), (date('Y') - $request->ageto));
            $age = date('Y-m-d', $time);
            $users = $users->where('birthday', '>=', $age);
        }

        if ($request->staffs != null && $request->new_staffs == null && $request->retire_staffs == null) {
            $invalid_users = User::whereYear('created_at', '>', $request->staffs)->get();

            foreach ($invalid_users as $invalid_user) {
                $users = $users->where('user_id', '!=',$invalid_user->user_id);
            }
        } elseif ($request->staffs == null && $request->new_staffs != null && $request->retire_staffs == null) {
            $invalid_users = User::whereYear('created_at', '!=', $request->new_staffs)->get();
            foreach ($invalid_users as $invalid_user) {
                $users = $users->where('user_id', '!=',$invalid_user->user_id);
            }
        } elseif ($request->staffs == null && $request->new_staffs == null && $request->retire_staffs != null) {
            $male_first = ($request->retire_staffs - 62).'-01-01';
            $male_last = ($request->retire_staffs - 62).'-12-31';

            $female_first = ($request->retire_staffs - 60).'-01-01';
            $female_last = ($request->retire_staffs - 60).'-12-31';

            $invalid_users = User::where([['status', 'new'], ['gender', 'male'], ['birthday', '>', $male_last]])
            ->orWhere([['status', 'new'], ['gender', 'male'], ['birthday', '<', $male_first]])
            ->orWhere([['status', 'new'], ['gender', 'female'], ['birthday', '<', $female_first]])
            ->orWhere([['status', 'new'], ['gender', 'female'], ['birthday', '>', $female_last]])
            ->get();

            foreach ($invalid_users as $invalid_user) {
                $users = $users->where('user_id', '!=',$invalid_user->user_id);
            }
        }

        // kiểm tra tên
        if ($request->name != null) {
            $ids = array();
            //so sánh chuỗi nhập với tên user để lấy kết quả
            foreach ($users as $staff) {
                $staff_name = '$'.strtoupper($staff->name);
                $existName = strpos($staff_name, strtoupper($request->name));
                if (!$existName) {
                    $ids[] = $staff->user_id;
                }
            }

            for ($i = 0; $i < count($ids); $i ++) {
                $users = $users->where('user_id', '!=' , $ids[$i]);
            }
        }

        foreach ($users as $user) {
            if ($user->gender == 'male') {
                $male++;
            } elseif ($user->gender == 'female') {
                $female++;
            }
        }

        return view('account.search.result', compact('users', 'male', 'female', 'units', 'positions'));
    }
}
