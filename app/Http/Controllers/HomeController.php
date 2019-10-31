<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

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

    /**
     * Show profile view.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showProfile()
    {
        return view('user.profile');
    }

    /**
     * Show form to change password.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showChangePasswordForm()
    {
        return view('user.change-password');
    }

    /**
     * Check to change password.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function changePassword(Request $request)
    {
        //
    }
}
