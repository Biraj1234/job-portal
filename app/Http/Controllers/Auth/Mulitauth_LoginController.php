<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $this->validator($request);
        if (Auth::attempt($request->only('email', 'password'))) {
            if (auth()->user()->role_id == 1) {

                return redirect()->route('admin.home');
            } elseif (auth()->user()->role_id == 2) {
                return redirect()->route('home');
            }
        }
        //Authentication failed...
        return $this->loginFailed();
    }
    private function validator(Request $request)
    {
        //validation rules.
        $rules = [
            'email' => 'required|exists:users',
            'password' => 'required|string|min:4|max:255'
        ];

        //custom validation error messages.
        $messages = [
            'email.exists' => "These credentials didn't match our records. Please try again",
        ];

        //validate the request.
        $request->validate($rules, $messages);
    }
    private function loginFailed()
    {
        return redirect()
            ->back()
            ->withInput()
            ->with('error', 'Login failed, please try again!');
    }
}
