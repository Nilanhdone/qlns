<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Model\Vacation;
use App\Model\UserInfo;
use App;
use session;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $works = UserInfo::where('user_id', $user->user_id)->get();
        $vacations = Vacation::where('user_id', $user->user_id)->get();

        if (isset($vacations) && !empty($vacations)) {
            $flag = 1;
            return view('home', compact('user', 'works', 'vacations', 'flag'));
        } else {
            $flag = 0;
            return view('home', compact('user', 'works', 'flag'));
        }
    }

    /**
     * Switch language and return back.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function lang($locale)
    {
        App::setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }

    /**
     * Show profile view.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showProfile()
    {
        return redirect()->route('home');
    }

    /**
     * Show form to change password.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showChangePasswordForm()
    {
        $user = Auth::user();
        return view('user.change-password', compact('user'));
    }

    /**
     * Check to change password.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function changePassword(Request $request)
    {
        try {
            DB::beginTransaction();
            
            $rules = [
                'old_password' => ['required', 'string', 'min:6'],
                'new_password' => ['required', 'string', 'min:6'],
                'repassword' => ['required', 'string', 'min:6', 'same:new_password'],
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $user = Auth::user();
            $user->password = Hash::make($request->new_password);
            $user->save();

            DB::commit();

            return redirect()->back()->with('success', 'Thay đổi mật khẩu thành công');
        } catch (Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error',$e->getMessage());
        }
    }
}
