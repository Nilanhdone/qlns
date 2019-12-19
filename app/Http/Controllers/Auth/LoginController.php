<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Model\User;
use Illuminate\Support\Facades\DB;
use session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Show login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Check input to login.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $rules = [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:6']
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $email = $request->email;
        $password = $request->password;

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $user = User::where('email', $email)->first();
            $first_login = $user->first_login;
            if ($first_login == 1) {
                return redirect()->route('home');
            } else {
                Auth::logout();
                Session::flash('success', 'First login, please change your default password to login.');
                return view('user.first-login', compact('email'));
            }
        } else {
            $errors = "Email or password is incorrect, try again!";
            return redirect()->back()->withErrors($errors)->withInput();
        }
    }

    /**
     * Logout.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function logout()
    {
        Auth::logout();
       return redirect()->route('home');
    }

    /**
     * Check first login.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function changePassword(Request $request)
    {
        try {
            DB::beginTransaction();

            $rules = [
                'email' => ['required'],
                'password' => ['required', 'string', 'min:6'],
                'repassword' => ['required', 'string', 'min:6', 'same:password'],
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $email = $request->email;
            $user = User::where('email', $email)->first();

            $password = $request->password;
            $user->password = Hash::make($password);
            $user->first_login = 1;
            $user->save();

            DB::commit();

            return redirect()->route('home');
        } catch (Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('errors', $e->getMessage());
        }
    }
}
