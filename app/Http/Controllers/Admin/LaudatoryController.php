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

class LaudatoryController extends Controller
{
    public function editLaudatory(Request $request)
    {
        try {
            DB::beginTransaction();

            $rules = [
                'title' => ['required'],
                'lau_year' => ['required'],
                'lau_organization' => ['required'],
                'lau_content' => ['required'],
            ];

            // kiểm tra điều kiện đầu vào
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            for ($i = 0; $i < count($request->title); $i++) {
                $laudatory = Laudatory::where([['user_id', $request->user_id], ['id', $request->id[$i]]])->first();
                $laudatory->title = $request->title[$i];
                $laudatory->year = $request->lau_year[$i];
                $laudatory->organization = $request->lau_organization[$i];
                $laudatory->content = $request->lau_content[$i];
                $laudatory->save();
            }

            DB::commit();

            return redirect()->back()->with('success', 'Edit successfully!');
        } catch (Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error',$e->getMessage());
        }
    }

    public function addLaudatory(Request $request)
    {
        $rules = [
            'title' => ['required'],
            'lau_year' => ['required'],
            'lau_organization' => ['required'],
            'lau_content' => ['required'],
        ];

        // kiểm tra điều kiện đầu vào
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        for ($i = 0; $i < count($request->title); $i++) {
            Laudatory::create([
                'user_id' => $request->user_id,
                'title' => $request->title[$i],
                'year' => $request->lau_year[$i],
                'organization' => $request->lau_organization[$i],
                'content' => $request->lau_content[$i],
            ]);
        }

        return redirect()->back()->with('success', 'Add new successfully!');
    }
}
