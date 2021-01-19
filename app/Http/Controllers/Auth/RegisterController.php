<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use auth;
use App\Models\User;
use App\Models\Admin;
use App\Models\Host;
use App\Models\Doorman;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\AuthenticationException;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'role' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $role = $data['role'];

        $user =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        switch ($role) {
            case 'admin':
                $admin = new admin();
                $admin->user_id= $user->id;
                $admin->save();
                return $user;
                break;

            case 'host':
                $host = new host();
                $host->user_id= $user->id;
                $host->save();
                return $user;
                break;

            case 'doorman':
                $doorman = new doorman();
                $doorman->user_id= $user->id;
                $doorman->save();
                return $user;
                break;

        }

    }
}
