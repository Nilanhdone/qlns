<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Support\Facades\Lang;
use App\Model\User;

class ExcelController extends Controller implements FromCollection, WithHeadings, ShouldAutoSize
{
    use Exportable;

    public $users;

    public function __construct(Request $request)
    {
        $this->users = $request->all();
    }

    public function collection()
    {
        $users = array();

        for ($i = 0; $i < count($this->users['user_id']) ; $i++) {
            $users[] = User::where('user_id', $this->users['user_id'][$i])->first();
        }

        foreach ($users as $row) {
            $user[] = array(
                '0' => $row->user_id,
                '1' => $row->recruitment_day,
                '2' => $row->name,
                '3' => Lang::get('messages.profile.basic.'.$row->gender),
                '4' => $row->birthday,
                '5' => Lang::get('messages.degree.'.$row->degree),
                '6' => $row->nationality,
                '7' => $row->religion,
                '8' => $row->hometown,
                '9' => $row->address,
                '10' => $row->phone,
                '11' => $row->email,
                '12' => Lang::get('messages.units.'.$row->unit),
                '13' => Lang::get('messages.positions.'.$row->position),
                '14' => $row->identity,
                '15' => $row->passport,
                '16' => Lang::get('bank.create.'.$row->matrimony),
                '17' => $row->party_day,
                '18' => $row->army_day,
                '19' => $row->health,
            );
        }

        return (collect($user));
    }

    public function headings(): array
    {
        return [
            Lang::get('messages.register.user-id'),
            Lang::get('bank.create.recruitment'),
            Lang::get('messages.register.name'),
            Lang::get('messages.register.gender'),
            Lang::get('messages.register.birthday'),
            Lang::get('messages.register.degree'),
            Lang::get('messages.register.nationality'),
            Lang::get('messages.register.religion'),
            Lang::get('messages.register.hometown'),
            Lang::get('messages.register.address'),
            Lang::get('messages.register.phone'),
            Lang::get('messages.register.email'),
            Lang::get('messages.register.unit'),
            Lang::get('messages.register.position'),
            Lang::get('bank.create.identity'),
            Lang::get('bank.create.passport'),
            Lang::get('bank.create.matrimony'),
            Lang::get('bank.create.party_day'),
            Lang::get('bank.create.army_day'),
            Lang::get('bank.create.health'),
        ];
    }

    public function export(Request $request)
    {
        return Excel::download(new ExcelController($request), 'bank.xlsx');
    }
}
