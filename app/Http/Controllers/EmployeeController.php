<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Model\User;
use App\Model\Unit;
use App\Model\Vacation;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    public function showVacationForm()
    {
        $user = Auth::user();
        return view('user.employee.vacation-leave', compact('user'));
    }

    public function sendVacation(Request $request)
    {
    	try {
            DB::beginTransaction();
            
            $rules = [
                'title' => ['required'],
                'reason' => ['required'],
                'start_day' => ['required'],
                'end_day' => ['required'],
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $user_id = Auth::user()->user_id;
            $work_unit = Auth::user()->work_unit;
            $status = 'waiting';

            Vacation::create([
                'status' => $status,
                'user_id' => $user_id,
                'work_unit' => $work_unit,
                'title' => $request->title,
                'reason' => $request->reason,
                'start_day' => $request->start_day,
                'end_day' => $request->end_day,
            ]);

            DB::commit();

            return redirect()->back()->with('success', 'Gửi xin phép thành công!');
        } catch (Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error',$e->getMessage());
        }
    }
}
