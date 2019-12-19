<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\User;
use App\Model\Unit;
use App\Model\Position;
use App\Model\Process;
use Auth;
use Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProcessController extends Controller
{
    public function showEditProcess($id)
    {
        $units = Unit::all();
        $positions = Position::all();

        $process = Process::where('id', $id)->first();
        $user_id = $process->user_id;
        $user = User::where('user_id', $user_id)->first();
        return view('account.detail.process.edit', compact('user','user_id', 'process', 'units', 'positions'));
    }

    public function editProcess(Request $request)
    {
        try {
            // dd($request->all()); exit();
            DB::beginTransaction();

            $rules = [
                'start_day' => ['required'],
                'end_day' => ['required'],
                'salary' => ['required'],
                'insurance' => ['required'],
            ];

            // kiểm tra điều kiện đầu vào
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $process = Process::where('id', $request->id)->first();
            $process->start_day = $request->start_day;
            $process->end_day = $request->end_day;
            $process->branch = explode('-', $request->unit)[0];
            $process->unit = $request->unit;
            $process->position = $request->position;
            $process->salary = $request->salary;
            $process->insurance = $request->insurance;
            $process->save();

            DB::commit();
            $user_id = $process->user_id;
            $processs = Process::where('user_id', $user_id)->get();
            return view('account.detail.profile.process', compact('processs', 'user_id'))->with('success', 'Edit successfully!');
        } catch (Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error',$e->getMessage());
        }
    }

    public function showUpdateProcess($user_id)
    {
        $units = Unit::all();
        $positions = Position::all();
        return view('account.detail.process.update', compact('user_id', 'units', 'positions'));
    }

    public function updateProcess(Request $request)
    {
        $rules = [
            'pr_start_day' => ['required'],
            'pr_end_day' => ['required'],
            'salary' => ['required'],
            'insurance' => ['required'],
        ];

        // kiểm tra điều kiện đầu vào
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Process::create([
            'user_id' => $request->user_id,
            'start_day' => $request->pr_start_day,
            'end_day' => $request->pr_end_day,
            'branch' => explode('-', $request->current_unit)[0],
            'position' => $request->current_position,
            'unit' => $request->current_unit,
            'salary' => $request->salary,
            'insurance' => $request->insurance,
        ]);

        $user = User::where('user_id', $request->user_id)->first();
        $user->unit = $request->current_unit;
        $user->position = $request->current_position;
        $user->save();

        return redirect()->back()->with('success', 'Add new successfully!');
    }
}
