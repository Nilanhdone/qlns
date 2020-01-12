<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Model\Application;
use Illuminate\Support\Facades\DB;

class ApplicationController extends Controller
{
    public function showAppForm($user_id)
    {
        return view('account.applications', compact('user_id'));
    }

    public function getApp(Request $request)
    {  
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

        Application::create([
            'user_id' => $request->user_id,
            'title' => $request->title,
            'reason' => $request->reason,
            'start_day' => $request->start_day,
            'end_day' => $request->end_day,
        ]);

        return redirect()->back()->with('success', 'Add application successfully!');
    }

    public function editApp(Request $request)
    {
        try {
            DB::beginTransaction();

            $rules = [
                'title' => ['required'],
                'reason' => ['required'],
                'start_day' => ['required'],
                'end_day' => ['required'],
            ];

            // kiểm tra điều kiện đầu vào
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            for ($i = 0; $i < count($request->title); $i++) {
                $application = Application::where([['user_id', $request->user_id], ['id', $request->id[$i]]])->first();
                $application->start_day = $request->start_day[$i];
                $application->end_day = $request->end_day[$i];
                $application->title = $request->title[$i];
                $application->reason = $request->reason[$i];
                $application->save();
            }

            DB::commit();

            return redirect()->back()->with('success', 'Edit successfully!');
        } catch (Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error',$e->getMessage());
        }
    }

    public function delete($id)
    {
        $application = Application::where('id', $id)->first();
        $application->delete();

        return redirect()->back()->with('success', 'Delete successfully!');
    }
}
