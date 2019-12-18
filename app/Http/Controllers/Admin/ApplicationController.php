<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Model\Application;

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
}
