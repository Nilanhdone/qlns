<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use session;

class LangController extends Controller
{
    /**
     * Switch language and return back.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function lang($locale)
    {
        App::setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }
}
