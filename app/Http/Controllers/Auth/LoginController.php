<?php

namespace App\Http\Controllers\Auth;

use App\LoginToken;
use App\Http\Controllers\Controller;
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
    protected $redirectTo = '/home';

    public function __construct()
    {
      $this->middleware('guest', ['except' => 'logout','byToken']);
    }

    protected function byToken(LoginToken $token)
    {
      $this->guard()->login($token->user);

      $token->delete();

      return redirect()->intended($this->redirectTo);
    }
}
