<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use auth;
use App\Models\Admin;
use App\Models\Host;
use App\Models\Doorman;


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
    //protected $redirectTo = RouteServiceProvider::HOME;
    protected function redirectTo() {

        $user = Auth()->user()->id;

        if ( Host::where('user_id',$user)->first() ) {
            return '/host';

        } elseif ( Admin::where('user_id',$user)->first() ) {
            return '/event/show/1';

        } elseif ( Doorman::where('user_id',$user)->first() ) {
            return '/doorman';
        }

    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
