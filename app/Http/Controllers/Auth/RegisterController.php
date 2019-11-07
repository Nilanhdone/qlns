<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\User;
use App\Model\UserInfo;
use Auth;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Notifications\RegisterNotification;

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
        // $this->middleware('auth');
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
                'user_id' => ['required', 'string', 'max:255'],
                'image' => ['required'],
                'name' => ['required', 'string', 'max:255'],
                'birthday' => ['required'],
                'identify_number' => ['required', 'string', 'max:255'],
                'nationality' => ['required', 'string', 'max:255'],
                'religion' => ['required', 'string', 'max:255'],
                'hometown' => ['required', 'string', 'max:255'],
                'address' => ['required', 'string', 'max:255'],
                'phone' => ['required', 'regex:/[0-9]/', 'min:10', 'max:11'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'start_day' => ['required'],
                'salary' => ['required', 'regex:/[0-9]/'],
                'insurance_number' => ['required', 'string'],
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            if ($request->hasFile('image')) {
                $image = $request->image;
                $avatar = time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('\img\avatar');
                $image->move($destinationPath, $avatar);
            }

            // generate a random password
            $password = Str::random(6);

            $user = User::create([
                'user_id' => $request->user_id,
                'avatar' => $avatar,
                'role' => $request->role,
                'name' => $request->name,
                'gender' => $request->gender,
                'birthday' => $request->birthday,
                'identify_number' => $request->identify_number,
                'nationality' => $request->nationality,
                'religion' => $request->religion,
                'hometown' => $request->hometown,
                'address' => $request->address,
                'phone' => $request->phone,
                'email' => $request->email,
                'degree' => $request->degree,
                'password' => Hash::make($password),
            ]);

            UserInfo::create([
                'user_id' => $request->user_id,
                'department' => $request->department,
                'work_unit' => $request->work_unit,
                'position' => $request->position,
                'start_day' => $request->start_day,
                'end_day' => $request->end_day,
                'salary' => $request->salary,
                'insurance_number' => $request->insurance_number,
            ]);

            $user->notify(new RegisterNotification($password));

            DB::commit();

            return redirect()->back()->with('success', 'Successfull');
        } catch (Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('errors', $e->getMessage());
        }
    }
}
