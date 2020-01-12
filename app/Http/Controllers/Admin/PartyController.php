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

class PartyController extends Controller
{
    public function editParty(Request $request)
    {
        try {
            DB::beginTransaction();

            $rules = [
                'party_start_day' => ['required'],
                'party_end_day' => ['required'],
                'party_position' => ['required'],
                'party_other' => ['required'],
            ];

            // kiểm tra điều kiện đầu vào
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            for ($i = 0; $i < count($request->party_start_day); $i++) {
                $party = Party::where([['user_id', $request->user_id], ['id', $request->id[$i]]])->first();
                $party->start_day = $request->party_start_day[$i];
                $party->end_day = $request->party_end_day[$i];
                $party->position= $request->party_position[$i];
                $party->other = $request->party_other[$i];
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
            'party_start_day' => ['required'],
            'party_end_day' => ['required'],
            'party_position' => ['required'],
            'party_other' => ['required'],
        ];

        // kiểm tra điều kiện đầu vào
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // lưu lịch sử học tập
        for ($i = 0; $i < count($request->party_start_day); $i++) {
            Party::create([
                'user_id' => $request->user_id,
                'start_day' => $request->party_start_day[$i],
                'end_day' => $request->party_end_day[$i],
                'position' => $request->party_position[$i],
                'other' => $request->party_other[$i],
            ]);
        }

        return redirect()->back()->with('success', 'Add new successfully!');
    }

    public function delete($id)
    {
        $party = Party::where('id', $id)->first();
        $party->delete();

        return redirect()->back()->with('success', 'Delete successfully!');
    }
}
