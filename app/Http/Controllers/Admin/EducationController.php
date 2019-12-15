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

class EducationController extends Controller
{
    public function editEducation(Request $request)
    {
        try {
            DB::beginTransaction();

            $rules = [
                'edu_start_day' => ['required'],
                'edu_end_day' => ['required'],
                'edu_unit' => ['required'],
                'edu_address' => ['required'],
            ];

            // kiểm tra điều kiện đầu vào
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            for ($i = 0; $i < count($request->edu_start_day); $i++) {
                $education = Education::where([['user_id', $request->user_id], ['id', $request->id[$i]]])->first();
                $education->start_day = $request->edu_start_day[$i];
                $education->end_day = $request->edu_end_day[$i];
                $education->unit = $request->edu_unit[$i];
                $education->address = $request->edu_address[$i];
                $education->save();
            }

            DB::commit();

            return redirect()->back()->with('success', 'Edit successfully!');
        } catch (Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error',$e->getMessage());
        }
    }
}
