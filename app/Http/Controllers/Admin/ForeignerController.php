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

class ForeignerController extends Controller
{
    public function editForeigner(Request $request)
    {
        try {
            DB::beginTransaction();

            $rules = [
                'fore_name' => ['required'],
                'fore_year' => ['required'],
                'fore_rela' => ['required'],
                'fore_nation' => ['required'],
            ];

            // kiểm tra điều kiện đầu vào
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            for ($i = 0; $i < count($request->fore_name); $i++) {
                $family = Foreigner::where([['user_id', $request->user_id], ['id', $request->id[$i]]])->first();
                $family->name = $request->fore_name[$i];
                $family->year = $request->fore_year[$i];
                $family->relationship = $request->fore_rela[$i];
                $family->nationality = $request->fore_nation[$i];
                $family->save();
            }

            DB::commit();

            return redirect()->back()->with('success', 'Edit successfully!');
        } catch (Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error',$e->getMessage());
        }
    }

    public function addForeigner(Request $request)
    {
        $rules = [
            'fore_name' => ['required'],
            'fore_year' => ['required'],
            'fore_rela' => ['required'],
            'fore_nation' => ['required'],
        ];

        // kiểm tra điều kiện đầu vào
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        for ($i = 0; $i < count($request->fore_name); $i++) {
            Foreigner::create([
                'user_id' => $request->user_id,
                'name' => $request->fore_name[$i],
                'year' => $request->fore_year[$i],
                'relationship' => $request->fore_rela[$i],
                'nationality' => $request->fore_nation[$i],
            ]);
        }

        return redirect()->back()->with('success', 'Add new successfully!');
    }
}
