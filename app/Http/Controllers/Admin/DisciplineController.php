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
use App\Model\Discipline;
use Auth;
use Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DisciplineController extends Controller
{
    public function editDiscipline(Request $request)
    {
        try {
            DB::beginTransaction();

            $rules = [
                'discipline' => ['required'],
                'dis_year' => ['required'],
                'dis_method' => ['required'],
            ];

            // kiểm tra điều kiện đầu vào
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            for ($i = 0; $i < count($request->discipline); $i++) {
                $discipline = Discipline::where([['user_id', $request->user_id], ['id', $request->id[$i]]])->first();
                $discipline->discipline = $request->discipline[$i];
                $discipline->year = $request->dis_year[$i];
                $discipline->method = $request->dis_method[$i];
                $discipline->save();
            }

            DB::commit();

            return redirect()->back()->with('success', 'Edit successfully!');
        } catch (Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error',$e->getMessage());
        }
    }

    public function addDiscipline(Request $request)
    {
        $rules = [
            'discipline' => ['required'],
            'dis_year' => ['required'],
            'dis_method' => ['required'],
        ];

        // kiểm tra điều kiện đầu vào
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        for ($i = 0; $i < count($request->discipline); $i++) {
            discipline::create([
                'user_id' => $request->user_id,
                'discipline' => $request->discipline[$i],
                'year' => $request->dis_year[$i],
                'method' => $request->dis_method[$i],
            ]);
        }

        return redirect()->back()->with('success', 'Add new successfully!');
    }

    public function delete($id)
    {
        $discipline = discipline::where('id', $id)->first();
        $discipline->delete();

        return redirect()->back()->with('success', 'Delete successfully!');
    }
}
