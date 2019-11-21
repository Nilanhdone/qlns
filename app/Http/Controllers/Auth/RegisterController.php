<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\User;
use App\Model\UserInfo;
use App\Model\Unit;
use App\Model\Position;
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
        // phải đăng nhập mới có thể sử dụng các chức năng
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
        $units = Unit::all();
        $positions = Position::all();
        return view('auth.register', compact('user', 'units', 'positions'));
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

            // các điều kiện đầu vào của form
            $rules = [
                'user_id' => ['required', 'string', 'max:255'],
                // 'image' => ['required'],
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

            // kiểm tra điều kiện của đầu vào, nếu không đúng thì in ra lỗi
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            // kiểm tra nếu có hình ảnh thì lưu hình ảnh
            if ($request->hasFile('image')) {
                $image = $request->image; // lấy ảnh từ đầu vào

                // tên ảnh = thời gian hiện tại + đuôi ảnh
                $avatar = time().'.'.$image->getClientOriginalExtension();

                // lưu ảnh vào thư mục public\img\avatar
                $destinationPath = public_path('\img\avatar'); // lấy đường dẫn thư mục
                $image->move($destinationPath, $avatar); // di chuyển ảnh vào
            }

            // tạo mật khẩu ngẫu nhiên cho tài khoản tạo mới
            $password = Str::random(6);

            // lưu thông tin cơ bản
            $user = User::create([
                'user_id' => $request->user_id,
                // 'avatar' => $avatar,
                'role' => $request->role,
                'position' => $request->position,
                'unit' => $request->unit,
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

            // lưu quá trình công tác đầu tiên
            UserInfo::create([
                'user_id' => $request->user_id,
                'branch' => explode('-', $request->unit)[0], // tách chuỗi từ unit để lấy branch
                'unit' => $request->unit,
                'position' => $request->position,
                'start_day' => $request->start_day,
                'end_day' => $request->end_day,
                'salary' => $request->salary,
                'insurance_number' => $request->insurance_number,
            ]);

            // gửi email thông báo đăng ký tài khoản, kèm theo MẬT KHẨU
            $user->notify(new RegisterNotification($password));

            DB::commit();

            // quay lại và thông báo thành công
            return redirect()->back()->with('success', 'Successfull');
        } catch (Exception $e) {
            DB::rollBack();

            //quay lại và thông báo lỗi
            return redirect()->back()->with('errors', $e->getMessage());
        }
    }
}
