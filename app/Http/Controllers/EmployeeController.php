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
        $heads = Unit::where('branch', 'head')->get();
        $obs = Unit::where('branch', 'ob')->get();
        $lbs = Unit::where('branch', 'lb')->get();
        $sbs = Unit::where('branch', 'sb')->get();
        $cbs = Unit::where('branch', 'cb')->get();
        $xbs = Unit::where('branch', 'xb')->get();
        
        $user = Auth::user();
        return view('user.employee.vacation-leave', compact('user', 'heads', 'obs', 'lbs', 'sbs', 'cbs', 'xbs'));
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
            $unit = Auth::user()->unit;
            $status = 'waiting';

            Vacation::create([
                'status' => $status,
                'user_id' => $user_id,
                'unit' => $unit,
                'title' => $request->title,
                'reason' => $request->reason,
                'start_day' => $request->start_day,
                'end_day' => $request->end_day,
            ]);

            DB::commit();

            return redirect()->back()->with('success', 'Send vacation leave successfully!');
        } catch (Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error',$e->getMessage());
        }
    }
}
