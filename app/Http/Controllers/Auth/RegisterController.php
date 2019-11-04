<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\User;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('auth');
    }

    /**
     * Show register form.
     *
     * @return \Illuminate\Http\Response
     */
    protected function showRegistrationForm()
    {
        $user = Auth::user();
        return view('auth.register', compact('user'));
    }

    /**
     * Check input to create a new user.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    protected function register(Request $request)
    {
        try {
            DB::beginTransaction();

            $rules = [
                'name' => ['required', 'string', 'max:255'],
                'phone' => ['required', 'regex:/[0-9]/', 'min:10', 'max:11'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'birthday' => ['required'],
                'nationality' => ['required', 'string', 'max:255'],
                'religion' => ['required', 'string', 'max:255'],
                'hometown' => ['required', 'string', 'max:255'],
                'address' => ['required', 'string', 'max:255'],
                'identify_number' => ['required', 'string', 'max:255'],
                'password' => ['required', 'string', 'min:6'],
                'repassword' => ['required', 'string', 'min:6', 'same:password']
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            User::create([
                'user_id' => $request->user_id,
                'gender' => $request->gender,
                'role' => $request->role,
                'degree' => $request->degree,
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'birthday' => $request->birthday,
                'nationality' => $request->nationality,
                'religion' => $request->religion,
                'hometown' => $request->hometown,
                'address' => $request->address,
                'identify_number' => $request->identify_number,
                'password' => Hash::make($request->password),
            ]);

            DB::commit();

            return redirect()->back()->with('success', 'Successfull');
        } catch (Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('errors', $e->getMessage());
        }
    }
}
