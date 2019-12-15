<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
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
use session;
use Auth;
use DateTime;

class UserController extends Controller
{
    public function showProfile()
    {
        // $user = Auth::user();
        $user_id = 2019001;
        $user = User::where('user_id', $user_id)->first();
        $educations = Education::where('user_id', $user_id)->get();
        $trainings = Training::where('user_id', $user_id)->get();
        $companys = Company::where('user_id', $user_id)->get();
        $governments = Government::where('user_id', $user_id)->get();
        $partys = Party::where('user_id', $user_id)->get();
        $familys = Family::where('user_id', $user_id)->get();
        $foreigners = Foreigner::where('user_id', $user_id)->get();
        $laudatorys = Laudatory::where('user_id', $user_id)->get();
        $infringes = Infringe::where('user_id', $user_id)->get();
        return view('account.profile.profile',
            compact('user', 'educations', 'trainings', 'companys', 'governments', 'partys', 'familys', 'foreigners', 'laudatorys', 'infringes'));
    }
}
