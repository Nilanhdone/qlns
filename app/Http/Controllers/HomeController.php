<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Model\Unit;
use App\Model\Position;
use App\Model\User;
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
        if (Auth::user()->role == 'employee') {
            return redirect()->route('profile');
        } else if (Auth::user()->role == 'admin') {
            $units = Unit::all();
            $positions = Position::all();
            return view('account.search.search', compact('units', 'positions'));
        }
    }

    /**
     * Show form to change password.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showChangePasswordForm()
    {
        return view('user.change-password');
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

            // lấy ra người dùng hiện tại
            $user = Auth::user();
            // kiểm tra nếu mật khẩu hiện tại không đúng
            if (!Hash::check($request->old_password, $user->password)) {
                // in ra lỗi
                $errors = "Current password is incorrect!";
                return redirect()->back()->withErrors($errors)->withInput();
            }

            // lưu mật khẩu mới
            $user->password = Hash::make($request->new_password);
            $user->save();

            DB::commit();

            return redirect()->back()->with('success', 'Change password successfully!');
        } catch (Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error',$e->getMessage());
        }
    }
}
