<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    protected $redirectTo = '/';

    public function index()
    {
        return view('authpage.login');
    }

    public function register()
    {
        return view('authpage.register');
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
      if(filter_var($request->username, FILTER_VALIDATE_EMAIL)) {
          Auth::attempt(['email' => $request->username, 'password' => $request->password]);
      } else {
          Auth::attempt(['username' => $request->username, 'password' => $request->password]);
      }

      if ( Auth::check()) {
          return redirect(route('homepage'));
      }
      return redirect(route('login'))->with('NotFound', 'Email / Password tidak diketahui');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
