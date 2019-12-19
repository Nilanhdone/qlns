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

class DisciplineController extends Controller
{
    public function editDiscipline(Request $request)
    {
        try {
            DB::beginTransaction();

            $rules = [
                'infringe' => ['required'],
                'inf_year' => ['required'],
                'inf_organization' => ['required'],
                'inf_method' => ['required'],
            ];

            // kiểm tra điều kiện đầu vào
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            for ($i = 0; $i < count($request->infringe); $i++) {
                $discipline = Infringe::where([['user_id', $request->user_id], ['id', $request->id[$i]]])->first();
                $discipline->infringe = $request->infringe[$i];
                $discipline->year = $request->inf_year[$i];
                $discipline->organization = $request->inf_organization[$i];
                $discipline->method = $request->inf_method[$i];
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
            'infringe' => ['required'],
            'inf_year' => ['required'],
            'inf_organization' => ['required'],
            'inf_method' => ['required'],
        ];

        // kiểm tra điều kiện đầu vào
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        for ($i = 0; $i < count($request->infringe); $i++) {
            Infringe::create([
                'user_id' => $request->user_id,
                'infringe' => $request->infringe[$i],
                'year' => $request->inf_year[$i],
                'organization' => $request->inf_organization[$i],
                'method' => $request->inf_method[$i],
            ]);
        }

        return redirect()->back()->with('success', 'Add new successfully!');
    }

    public function delete($id)
    {
        $discipline = Infringe::where('id', $id)->first();
        $discipline->delete();

        return redirect()->back()->with('success', 'Delete successfully!');
    }
}
