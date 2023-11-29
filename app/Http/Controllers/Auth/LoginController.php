<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login(Request $request)
    {
        $this->validateLogin($request);

        if ($request->input('remember')) {
            $request->session()->put('email', $request->input('email'));
        }

        if ($this->attemptLogin($request)) {
            // Login sukses, simpan pesan sukses dalam session
            session()->flash('success', 'Login berhasil!');
            return $this->sendLoginResponse($request);
        }

        return $this->sendFailedLoginResponse($request);
    }
    public function logout(Request $request)
    {
        try {
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            Auth::logout();
            return redirect()->route('login')->with([
                'success' => 'Logout berhasil!',
            ]);
        } catch (\Throwable $th) {
            return back();
        }
    }
}
