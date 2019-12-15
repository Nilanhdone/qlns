<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\User;
use App\Model\Unit;
use App\Model\Position;
use App\Model\Education;
use App\Model\Training;
use App\Model\Company;
use App\Model\Government;
use App\Model\Party;
use App\Model\Family;
use App\Model\Foreigner;
use App\Model\Laudatory;
use App\Model\Infringe;
use Auth;
use Session;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Notifications\RegisterNotification;

class AccountController extends Controller
{
    public function showCreateAccount()
    {
        $units = Unit::all();
        $positions = Position::all();
        return view('account.create.create-account', compact('units', 'positions'));
    }

    public function createAccount(Request $request)
    {
        // các điều kiện đầu vào của form
        $rules = [
            'user_id' => ['required', 'string', 'max:255'],
            'image' => ['required'],
            'fullname' => ['required', 'string', 'max:255'],
            'birthday' => ['required'],
            'user_nationality' => ['required', 'string', 'max:255'],
            'religion' => ['required', 'string', 'max:255'],
            'hometown' => ['required', 'string', 'max:255'],
            'user_address' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'regex:/[0-9]/', 'min:10', 'max:11'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'edu_start_day' => ['required'],
            'edu_end_day' => ['required'],
            'edu_unit' => ['required'],
            'edu_address' => ['required'],
            'fa_name' => ['required'],
            'fa_year' => ['required'],
            'fa_rela' => ['required'],
            'fa_address' => ['required'],
            'salary' => ['required'],
            'insurance' => ['required'],
        ];

        // kiểm tra điều kiện đầu vào
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // dd($request->edu_start_day); exit();
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
            'role' => $request->role,
            'position' => $request->current_position,
            'unit' => $request->current_unit,
            'avatar' => $avatar,
            'name' => $request->fullname,
            'gender' => $request->gender,
            'birthday' => $request->birthday,
            'nationality' => $request->user_nationality,
            'religion' => $request->religion,
            'hometown' => $request->hometown,
            'address' => $request->user_address,
            'phone' => $request->phone,
            'email' => $request->email,
            'degree' => $request->degree,
            'salary' => $request->salary,
            'insurance' => $request->insurance,
            'password' => Hash::make($password),
        ]);

        // lưu lịch sử học tập
        for ($i = 0; $i < count($request->edu_start_day); $i++) {
            Education::create([
                'user_id' => $user_id,
                'start_day' => $request->edu_start_day[$i],
                'end_day' => $request->edu_end_day[$i],
                'unit' => $request->edu_unit[$i],
                'address' => $request->edu_address[$i],
            ]);
        }

        //lưu lịch sử đào tạo nâng cao nếu có
        if ($request->train_start_day != null) {
            for ($i = 0; $i < count($request->train_start_day); $i++) {
                Training::create([
                    'user_id' => $user_id,
                    'start_day' => $request->train_start_day[$i],
                    'end_day' => $request->train_end_day[$i],
                    'unit' => $request->train_unit[$i],
                    'address' => $request->train_address[$i],
                    'content' => $request->train_content[$i],
                ]);
            }
        }

        // lưu lịch sử làm công ty ngoài nhà nước
        if ($request->com_start_day != null) {
            for ($i = 0; $i < count($request->com_start_day); $i++) {
                Company::create([
                    'user_id' => $user_id,
                    'start_day' => $request->com_start_day[$i],
                    'end_day' => $request->com_end_day[$i],
                    'unit' => $request->com_unit[$i],
                    'position' => $request->com_position[$i],
                ]);
            }
        }

        //lưu lịch sử làm công ty nhà nước
        if ($request->gov_start_day != null) {
            for ($i = 0; $i < count($request->gov_start_day); $i++) {
                Government::create([
                    'user_id' => $user_id,
                    'start_day' => $request->gov_start_day[$i],
                    'end_day' => $request->gov_end_day[$i],
                    'unit' => $request->gov_unit[$i],
                    'position' => $request->gov_position[$i],
                ]);
            }
        }

        // lưu lịch sử tham gia đảng, đoàn thể
        if ($request->join_day != null) {
            for ($i = 0; $i < count($request->join_day); $i++) {
                Party::create([
                    'user_id' => $user_id,
                    'join_day' => $request->join_day[$i],
                    'unit' => $request->party_unit[$i],
                    'position' => $request->party_position[$i],
                ]);
            }
        }

        // lưu mối quan hệ gia đình
        for ($i = 0; $i < count($request->fa_name); $i++) {
            Family::create([
                'user_id' => $user_id,
                'name' => $request->fa_name[$i],
                'year' => $request->fa_year[$i],
                'relationship' => $request->fa_rela[$i],
                'address' => $request->fa_address[$i],
            ]);
        }

        // lưu mối quan hệ với người nước ngoài
        if ($request->fore_name != null) {
            for ($i = 0; $i < count($request->fore_name); $i++) {
                Foreigner::create([
                    'user_id' => $user_id,
                    'name' => $request->fore_name[$i],
                    'year' => $request->fore_year[$i],
                    'relationship' => $request->fore_rela[$i],
                    'nationality' => $request->fore_nation[$i],
                ]);
            }
        }


        // lưu các khen thưởng
        if ($request->title != null) {
            for ($i = 0; $i < count($request->title); $i++) {
                Laudatory::create([
                    'user_id' => $user_id,
                    'title' => $request->title[$i],
                    'year' => $request->lau_year[$i],
                    'organization' => $request->lau_organization[$i],
                    'content' => $request->lau_content[$i],
                ]);
            }
        }

        // lưu các vi phạm kỉ luật
        if ($request->infringe != null) {
            for ($i = 0; $i < count($request->infringe); $i++) {
                Infringe::create([
                    'user_id' => $user_id,
                    'infringe' => $request->infringe[$i],
                    'year' => $request->inf_year[$i],
                    'organization' => $request->inf_organization[$i],
                    'method' => $request->inf_method[$i],
                ]);
            }
        }

        // gửi email thông báo đăng ký tài khoản, kèm theo MẬT KHẨU
        $user->notify(new RegisterNotification($password));

        // quay lại và thông báo thành công
        return redirect()->back()->with('success', 'Successfull');
    }
}
