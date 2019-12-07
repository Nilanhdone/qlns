<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Model\UserInfo;

class PDFController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $works = UserInfo::where('user_id', $user->user_id)->get();
        $footertext = '{DATE Y-m-j} from BANK OF THE LAO P.D.R System';
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->SetFooter($footertext);
        $mpdf->WriteHTML(\View::make('user.pdf.profile-pdf', compact('user', 'works')));
        $mpdf->debug = true;
        $mpdf->Output();
    }
}
