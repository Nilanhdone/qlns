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
use Auth;
use Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    public function editCompany(Request $request)
    {
        try {
            DB::beginTransaction();

            $rules = [
                'com_start_day' => ['required'],
                'com_end_day' => ['required'],
                'com_unit' => ['required'],
                'com_position' => ['required'],
            ];

            // kiểm tra điều kiện đầu vào
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            for ($i = 0; $i < count($request->com_start_day); $i++) {
                $company = Company::where([['user_id', $request->user_id], ['id', $request->id[$i]]])->first();
                $company->start_day = $request->com_start_day[$i];
                $company->end_day = $request->com_end_day[$i];
                $company->unit = $request->com_unit[$i];
                $company->position= $request->com_position[$i];
                $company->save();
            }

            DB::commit();

            return redirect()->back()->with('success', 'Edit successfully!');
        } catch (Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error',$e->getMessage());
        }
    }

    public function addCompany(Request $request)
    {
        $rules = [
            'com_start_day' => ['required'],
            'com_end_day' => ['required'],
            'com_unit' => ['required'],
            'com_position' => ['required'],
        ];

        // kiểm tra điều kiện đầu vào
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // lưu lịch sử học tập
        for ($i = 0; $i < count($request->com_start_day); $i++) {
            Company::create([
                'user_id' => $request->user_id,
                'start_day' => $request->com_start_day[$i],
                'end_day' => $request->com_end_day[$i],
                'unit' => $request->com_unit[$i],
                'position' => $request->com_position[$i],
            ]);
        }

        return redirect()->back()->with('success', 'Add new successfully!');
    }

    public function delete($id)
    {
        $company = Company::where('id', $id)->first();
        $company->delete();

        return redirect()->back()->with('success', 'Delete successfully!');
    }
}
