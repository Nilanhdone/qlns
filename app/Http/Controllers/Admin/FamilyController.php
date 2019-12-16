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
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class FamilyController extends Controller
{
    public function editFamily(Request $request)
    {
        try {
            DB::beginTransaction();

            $rules = [
                'fa_name' => ['required'],
                'fa_year' => ['required'],
                'fa_rela' => ['required'],
                'fa_address' => ['required'],
            ];

            // kiểm tra điều kiện đầu vào
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            for ($i = 0; $i < count($request->fa_name); $i++) {
                $family = Family::where([['user_id', $request->user_id], ['id', $request->id[$i]]])->first();
                $family->name = $request->fa_name[$i];
                $family->year = $request->fa_year[$i];
                $family->relationship = $request->fa_rela[$i];
                $family->address = $request->fa_address[$i];
                $family->save();
            }

            DB::commit();

            return redirect()->back()->with('success', 'Edit successfully!');
        } catch (Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error',$e->getMessage());
        }
    }

    public function addFamily(Request $request)
    {
        $rules = [
            'fa_name' => ['required'],
            'fa_year' => ['required'],
            'fa_rela' => ['required'],
            'fa_address' => ['required'],
        ];

        // kiểm tra điều kiện đầu vào
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // lưu lịch sử học tập
        for ($i = 0; $i < count($request->fa_name); $i++) {
            Family::create([
                'user_id' => $request->user_id,
                'name' => $request->fa_name[$i],
                'year' => $request->fa_year[$i],
                'relationship' => $request->fa_rela[$i],
                'address' => $request->fa_address[$i],
            ]);
        }

        return redirect()->back()->with('success', 'Add new successfully!');
    }
}
