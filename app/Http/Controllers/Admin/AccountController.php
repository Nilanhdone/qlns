<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\UserInfo;
use App\Model\User;
use App\Model\Unit;
use App\Model\Position;
use App\Model\EduHis;
use Auth;
use Session;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class AccountController extends Controller
{
    public function showCreateAccountForm()
    {
        return view('account.create.basic-info');
    }

    public function createBasicInfo(Request $request)
    {
        // các điều kiện đầu vào của form
        $rules = [
            'user_id' => ['required', 'string', 'max:255'],
            'image' => ['required'],
            'name' => ['required', 'string', 'max:255'],
            'birthday' => ['required'],
            'nationality' => ['required', 'string', 'max:255'],
            'religion' => ['required', 'string', 'max:255'],
            'hometown' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            // 'phone' => ['required', 'regex:/[0-9]/', 'min:10', 'max:11'],
            'phone' => ['required', 'regex:/[0-9]/', 'max:11'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ];

        // kiểm tra điều kiện đầu vào
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

        $user_id = $request->user_id;
        // lưu thông tin cơ bản
        $user = User::create([
            'user_id' => $user_id,
            'avatar' => $avatar,
            'name' => $request->name,
            'gender' => $request->gender,
            'birthday' => $request->birthday,
            'nationality' => $request->nationality,
            'religion' => $request->religion,
            'hometown' => $request->hometown,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'degree' => $request->degree,
            'password' => Hash::make($password),
        ]);

        // return view('account.create.education.number', compact('user_id'));
    }

    public function showNumHisEdu($user_id)
    {
        
    }

    public function addNumHisEdu(Request $request)
    {
        $rules = [
            'user_id' => ['required'],
            'number' => ['required', 'numeric', 'min:4'],
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user_id = $request->user_id;
        $number = $request->number;
        return view('account.create.education.history', compact('user_id','number'));
    }

    public function createHisEdu(Request $request)
    {
        $rules = [
            'user_id' => ['required'],
            'start_day' => ['required'],
            'end_day' => ['required'],
            'unit' => ['required', 'string'],
            'address' => ['required', 'string'],
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user_id = $request->user_id;
        for ($i = 0; $i < count($request->start_day); $i++) {
            EduHis::create([
                'user_id' => $user_id,
                'start_day' => $request->start_day[$i],
                'end_day' => $request->end_day[$i],
                'unit' => $request->unit[$i],
                'address' => $request->address[$i],
            ]);
        }

        return view('account.create.training.number', compact('user_id'));
    }

    public function addNumHisTrain(Request $request)
    {
        $rules = [
            'number' => ['required', 'numeric', 'min:0'],
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $number = $request->number;
        return view('account.create.history-training', compact('number'));
    }

    public function addNumHisCompany(Request $request)
    {
        $rules = [
            'number' => ['required', 'numeric', 'min:0'],
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $number = $request->number;
        return view('account.create.history-company', compact('number'));
    }

    public function addNumHisParty(Request $request)
    {
        $rules = [
            'number' => ['required', 'numeric', 'min:3'],
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $number = $request->number;
        return view('account.create.history-party', compact('number'));
    }

    public function addNumHisGov(Request $request)
    {
        $rules = [
            'number' => ['required', 'numeric', 'min:0'],
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $number = $request->number;
        return view('account.create.history-government', compact('number'));
    }
}
