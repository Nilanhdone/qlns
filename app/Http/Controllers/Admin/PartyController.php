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

class PartyController extends Controller
{
    public function editParty(Request $request)
    {
        try {
            DB::beginTransaction();

            $rules = [
                'join_day' => ['required'],
                'party_unit' => ['required'],
                'party_position' => ['required'],
            ];

            // kiểm tra điều kiện đầu vào
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            for ($i = 0; $i < count($request->join_day); $i++) {
                $party = Party::where([['user_id', $request->user_id], ['id', $request->id[$i]]])->first();
                $party->join_day = $request->join_day[$i];
                $party->unit = $request->party_unit[$i];
                $party->position= $request->party_position[$i];
                $party->save();
            }

            DB::commit();

            return redirect()->back()->with('success', 'Edit successfully!');
        } catch (Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error',$e->getMessage());
        }
    }

    public function addParty(Request $request)
    {
        $rules = [
            'join_day' => ['required'],
            'party_unit' => ['required'],
            'party_position' => ['required'],
        ];

        // kiểm tra điều kiện đầu vào
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // lưu lịch sử học tập
        for ($i = 0; $i < count($request->join_day); $i++) {
            Party::create([
                'user_id' => $request->user_id,
                'join_day' => $request->join_day[$i],
                'unit' => $request->party_unit[$i],
                'position' => $request->party_position[$i],
            ]);
        }

        return redirect()->back()->with('success', 'Add new successfully!');
    }
}
