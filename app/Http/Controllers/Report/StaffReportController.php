<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Support\Facades\Lang;
use App\Model\User;

class StaffReportController extends Controller implements FromCollection, WithHeadings, ShouldAutoSize
{
    use Exportable;

    public $type;

    public function __construct($type = null)
    {
        $this->type = $type;
    }

    public function collection()
    {
        $users = User::where('status', 'new')->get();

        if ($this->type == 'retire') {
            $today = date('Y-m-d');
            $time =  mktime(0,0,0, date('m'), date('d'), (date('Y') + 5));
            $retire_time = date('Y-m-d', $time);

            $male_first = (date('Y') - 62).'-'.date('m').'-'.date('d');
            $male_last = (date('Y') - 62 + 5).'-'.date('m').'-'.date('d');

            $female_first = (date('Y') - 60).'-'.date('m').'-'.date('d');
            $female_last = (date('Y') - 60 + 5).'-'.date('m').'-'.date('d');

            $invalid_users = User::where([['status', 'new'], ['gender', 'male'], ['birthday', '>', $male_last]])
            ->orWhere([['status', 'new'], ['gender', 'male'], ['birthday', '<', $male_first]])
            ->orWhere([['status', 'new'], ['gender', 'female'], ['birthday', '<', $female_first]])
            ->orWhere([['status', 'new'], ['gender', 'female'], ['birthday', '>', $female_last]])
            ->get();

            foreach ($invalid_users as $invalid_user) {
                $users = $users->where('user_id', '!=',$invalid_user->user_id);
            }
        }

        foreach ($users as $row) {
            $user[] = array(
                '0' => $row->user_id,
                '1' => $row->name,
                '2' => Lang::get('messages.profile.basic.'.$row->gender),
                '3' => $row->birthday,
                '4' => Lang::get('messages.degree.'.$row->degree),
                '5' => $row->nationality,
                '6' => $row->religion,
                '7' => $row->hometown,
                '8' => $row->address,
                '9' => $row->phone,
                '10' => $row->email,
                '11' => Lang::get('messages.units.'.$row->unit),
                '12' => Lang::get('messages.positions.'.$row->position),
            );
        }

        return (collect($user));
    }

    public function headings(): array
    {
        return [
            Lang::get('messages.register.user-id'),
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
        ];
    }

    public function export($type)
    {
        return Excel::download(new StaffReportController($type), 'bank.xlsx');
    }
}
