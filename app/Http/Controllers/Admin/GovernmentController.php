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

class GovernmentController extends Controller
{
    public function editGov(Request $request)
    {
        try {
            DB::beginTransaction();

            $rules = [
                'gov_start_day' => ['required'],
                'gov_end_day' => ['required'],
                'gov_unit' => ['required'],
                'gov_position' => ['required'],
            ];

            // kiểm tra điều kiện đầu vào
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            for ($i = 0; $i < count($request->gov_start_day); $i++) {
                $government = Government::where([['user_id', $request->user_id], ['id', $request->id[$i]]])->first();
                $government->start_day = $request->gov_start_day[$i];
                $government->end_day = $request->gov_end_day[$i];
                $government->unit = $request->gov_unit[$i];
                $government->position= $request->gov_position[$i];
                $government->save();
            }

            DB::commit();

            return redirect()->back()->with('success', 'Edit successfully!');
        } catch (Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error',$e->getMessage());
        }
    }

    public function addGov(Request $request)
    {
        $rules = [
            'gov_start_day' => ['required'],
            'gov_end_day' => ['required'],
            'gov_unit' => ['required'],
            'gov_position' => ['required'],
        ];

        // kiểm tra điều kiện đầu vào
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // lưu lịch sử học tập
        for ($i = 0; $i < count($request->gov_start_day); $i++) {
            Government::create([
                'user_id' => $request->user_id,
                'start_day' => $request->gov_start_day[$i],
                'end_day' => $request->gov_end_day[$i],
                'unit' => $request->gov_unit[$i],
                'position' => $request->gov_position[$i],
            ]);
        }

        return redirect()->back()->with('success', 'Add new successfully!');
    }

    public function delete($id)
    {
        $government = Government::where('id', $id)->first();
        $government->delete();

        return redirect()->back()->with('success', 'Delete successfully!');
    }
}
