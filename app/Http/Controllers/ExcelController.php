<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Model\User;

class ExcelController extends Controller implements FromCollection, WithHeadings
{
    use Exportable;

    public $users;

    public function __construct(Request $request)
    {
        $this->users = $request->all();
    }

    public function collection()
    {
        $users = $this->users;

        for ($i=0; $i < count($users['user_name']) ; $i++) { 
            $user[] = array(
                '0' => $users['user_name'][$i],
                '1' => $users['user_unit'][$i],
                '2' => $users['user_position'][$i],
                '3' => $users['user_phone'][$i],
                '4' => $users['user_email'][$i],
            );
        }

        return (collect($user));
    }

    public function headings(): array
    {
        return [
            'Full name',
            'Unit',
            'Positiin',
            'Phone',
            'Email',
        ];
    }

    public function export(Request $request)
    {
        return Excel::download(new ExcelController($request), 'bank.xlsx');
    }
}
