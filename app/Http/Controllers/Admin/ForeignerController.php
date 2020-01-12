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
                'fore_time' => ['required'],
            ];

            // kiểm tra điều kiện đầu vào
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            for ($i = 0; $i < count($request->fore_name); $i++) {
                $foreigner = Foreigner::where([['user_id', $request->user_id], ['id', $request->id[$i]]])->first();
                $foreigner->name = $request->fore_name[$i];
                $foreigner->year = $request->fore_year[$i];
                $foreigner->relationship = $request->fore_rela[$i];
                $foreigner->nationality = $request->fore_nation[$i];
                $foreigner->time = $request->fore_time[$i];
                $foreigner->save();
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
            'fore_time' => ['required'],
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
                'time' => $request->fore_time[$i],
            ]);
        }

        return redirect()->back()->with('success', 'Add new successfully!');
    }

    public function delete($id)
    {
        $foreigner = Foreigner::where('id', $id)->first();
        $foreigner->delete();

        return redirect()->back()->with('success', 'Delete successfully!');
    }
}
