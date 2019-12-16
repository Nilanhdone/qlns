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
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class TrainingController extends Controller
{
    public function editTrain(Request $request)
    {
        try {
            DB::beginTransaction();

            $rules = [
                'train_start_day' => ['required'],
                'train_end_day' => ['required'],
                'train_unit' => ['required'],
                'train_address' => ['required'],
                'train_content' => ['required'],
            ];

            // kiểm tra điều kiện đầu vào
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            for ($i = 0; $i < count($request->train_start_day); $i++) {
                $training = Training::where([['user_id', $request->user_id], ['id', $request->id[$i]]])->first();
                $training->start_day = $request->train_start_day[$i];
                $training->end_day = $request->train_end_day[$i];
                $training->unit = $request->train_unit[$i];
                $training->address = $request->train_address[$i];
                $training->content = $request->train_content[$i];
                $training->save();
            }

            DB::commit();

            return redirect()->back()->with('success', 'Edit successfully!');
        } catch (Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error',$e->getMessage());
        }
    }

    public function addTrain(Request $request)
    {
        $rules = [
            'train_start_day' => ['required'],
            'train_end_day' => ['required'],
            'train_unit' => ['required'],
            'train_address' => ['required'],
            'train_content' => ['required'],
        ];

        // kiểm tra điều kiện đầu vào
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // lưu lịch sử học tập
        for ($i = 0; $i < count($request->train_start_day); $i++) {
            Training::create([
                'user_id' => $request->user_id,
                'start_day' => $request->train_start_day[$i],
                'end_day' => $request->train_end_day[$i],
                'unit' => $request->train_unit[$i],
                'address' => $request->train_address[$i],
                'content' => $request->train_content[$i],
            ]);
        }

        return redirect()->back()->with('success', 'Add new successfully!');
    }
}
