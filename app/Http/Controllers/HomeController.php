<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use session;
use App\Model\User;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Display regist view.
     *
     * @return void
     */
    public function getRegist()
    {
        return view('main-view.regist');
    }

    /**
     * Create a new account.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function regist(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;

        $user = new User;
        $user->name = $name;
        $user->email = $email;
        $user->password = bcrypt($password);
        $user->save();

        return redirect()->back();
    }

    /**
     * Login.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function login(Request $request)
    {
        return view('main-view.profile');
    }

    /**
     * Switch languages and return back.
     *
     * @param  $locale
     * @return void
     */
    public function lang($locale)
    {
        App::setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }
}
