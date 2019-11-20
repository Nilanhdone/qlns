<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Model\Vacation;
use App\Model\User;

class ManagerController extends Controller
{
    public function showVacationList()
    {
        $user = Auth::user();
        $work_unit = $user->work_unit;
        $vacations = Vacation::where([['work_unit', $work_unit],['status', 'waiting']])->get();

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

    public function addWorkCalender(Request $request)
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
