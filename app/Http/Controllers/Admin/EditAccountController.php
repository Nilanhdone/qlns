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
use App\Model\Process;
use App\Model\Application;
use Auth;
use Session;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class EditAccountController extends Controller
{
    public function showDetailAccount($user_id, $component)
    {
        $user = User::where('user_id', $user_id)->first();
        if ($component == 'basic') {
            // $user = User::where('user_id', $user_id)->first();
            return view('account.detail.profile.basic-info', compact('user', 'user_id'));
        } else if ($component == 'educations') {
            $educations = Education::where('user_id', $user_id)->get();
            return view('account.detail.profile.education', compact('educations', 'user', 'user_id'));
        } else if ($component == 'trainings') {
            $trainings = Training::where('user_id', $user_id)->get();
            return view('account.detail.profile.training', compact('trainings', 'user', 'user_id'));
        } else if ($component == 'companys') {
            $companys = Company::where('user_id', $user_id)->get();
            return view('account.detail.profile.company', compact('companys', 'user', 'user_id'));
        } else if ($component == 'governments') {
            $governments = Government::where('user_id', $user_id)->get();
            return view('account.detail.profile.government', compact('governments', 'user', 'user_id'));
        } else if ($component == 'partys') {
            $partys = Party::where('user_id', $user_id)->get();
            return view('account.detail.profile.party', compact('partys', 'user', 'user_id'));
        } else if ($component == 'familys') {
            $familys = Family::where('user_id', $user_id)->get();
            return view('account.detail.profile.family', compact('familys', 'user', 'user_id'));
        } else if ($component == 'foreigners') {
            $foreigners = Foreigner::where('user_id', $user_id)->get();
            return view('account.detail.profile.foreigner', compact('foreigners', 'user', 'user_id'));
        } else if ($component == 'laudatorys') {
            $laudatorys = Laudatory::where('user_id', $user_id)->get();
            return view('account.detail.profile.laudatory', compact('laudatorys', 'user', 'user_id'));
        } else if ($component == 'disciplines') {
            $disciplines = Infringe::where('user_id', $user_id)->get();
            return view('account.detail.profile.discipline', compact('disciplines', 'user', 'user_id'));
        } else if ($component == 'processs') {
            $processs = Process::where('user_id', $user_id)->get();
            return view('account.detail.profile.process', compact('processs', 'user', 'user_id'));
        } else if ($component == 'applications') {
            $applications = Application::where('user_id', $user_id)->get();
            return view('account.detail.profile.application', compact('applications', 'user', 'user_id'));
        }
    }

    public function editBasicInfo(Request $request)
    {
        try {
            DB::beginTransaction();

            $rules = [
                'user_id' => ['required'],
                'name' => ['required', 'string', 'max:255'],
                'birthday' => ['required'],
                'nationality' => ['required', 'string', 'max:255'],
                'religion' => ['required', 'string', 'max:255'],
                'hometown' => ['required', 'string', 'max:255'],
                'address' => ['required', 'string', 'max:255'],
                'phone' => ['required', 'regex:/[0-9]/', 'min:10', 'max:11'],
                'email' => ['required'],
            ];

            // kiểm tra điều kiện đầu vào
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $user = User::where('user_id', $request->user_id)->first();
            $user->name = $request->name;
            $user->gender = $request->gender;
            $user->birthday = $request->birthday;
            $user->degree = $request->degree;
            $user->nationality = $request->nationality;
            $user->religion = $request->religion;
            $user->hometown = $request->hometown;
            $user->address = $request->address;
            $user->phone = $request->phone;
            $user->save();

            DB::commit();

            return redirect()->back()->with('success', 'Edit successfully!');
        } catch (Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error',$e->getMessage());
        }
    }

    public function printProfile($user_id)
    {
        $user = User::where('user_id', $user_id)->first();
        $educations = Education::where('user_id', $user_id)->get();
        $trainings = Training::where('user_id', $user_id)->get();
        $companys = Company::where('user_id', $user_id)->get();
        $governments = Government::where('user_id', $user_id)->get();
        $partys = Party::where('user_id', $user_id)->get();
        $familys = Family::where('user_id', $user_id)->get();
        $foreigners = Foreigner::where('user_id', $user_id)->get();
        $laudatorys = Laudatory::where('user_id', $user_id)->get();
        $disciplines = Infringe::where('user_id', $user_id)->get();
        $processs = Process::where('user_id', $user_id)->get();
        $applications = Application::where('user_id', $user_id)->get();

        $avatar = public_path('img/avatar/'.$user->avatar);
        $logo = public_path('img/logo.png');

        $footertext = '{DATE Y-m-j} from BANK OF THE LAO P.D.R System';
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->SetFooter($footertext);
        $mpdf->WriteHTML(\View::make('account.profile-pdf', compact('user', 'avatar', 'logo','educations', 'trainings', 'companys', 'governments', 'partys', 'familys', 'foreigners', 'laudatorys', 'disciplines', 'processs', 'applications')));
        $mpdf->debug = true;
        $mpdf->Output();
    }

    public function deleteAccount($user_id)
    {
        $status = 'delete';
        $user = User::where('user_id', $user_id)->first();
        $user->status = $status;
        $user->save();

        return redirect()->back();
    }
}