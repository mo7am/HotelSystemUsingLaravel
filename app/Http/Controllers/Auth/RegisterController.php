<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\model_has_role;
use App\Models\model_has_permission;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DB;

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
   // protected $redirectTo = RouteServiceProvider::INDEXANYUSER;

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
            'fname' => ['required', 'string', 'max:255'],
            'mname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $remember = request()->has('remember')?true:false;
       $user =  User::create([
            'fname' => $data['fname'],
            'mname' => $data['mname'],
            'lname' => $data['lname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'type_id' => $data['status'] ,
            'balance' => 0,
            'stateBlock' => 8,
            'image' => 'img-1.jpg',
            'remember_token' => $remember,
        ]);



        if($data['status'] == 2) {
            model_has_role::create([
                'role_id' => 2,
                'model_type' => "App\Models\User",
                'model_id' => $user->id,
            ]);

            model_has_permission::create([
                'permission_id' => 2,
                'model_type' => "App\Models\User",
                'model_id' => $user->id,
            ]);
        }elseif ($data['status'] == 3){
            model_has_role::create([
                'role_id' => 3,
                'model_type' => "App\Models\User",
                'model_id' => $user->id,
            ]);

            model_has_permission::create([
                'permission_id' => 3,
                'model_type' => "App\Models\User",
                'model_id' => $user->id,
            ]);
        }elseif ($data['status'] == 4){
            model_has_role::create([
                'role_id' => 4,
                'model_type' => "App\Models\User",
                'model_id' => $user->id,
            ]);

            model_has_permission::create([
                'permission_id' => 4,
                'model_type' => "App\Models\User",
                'model_id' => $user->id,
            ]);
        }
        elseif ($data['status'] == 5){
            model_has_role::create([
                'role_id' => 5,
                'model_type' => "App\Models\User",
                'model_id' => $user->id,
            ]);

            model_has_permission::create([
                'permission_id' => 5,
                'model_type' => "App\Models\User",
                'model_id' => $user->id,
            ]);
        }
        elseif ($data['status'] == 6){
            model_has_role::create([
                'role_id' => 6,
                'model_type' => "App\Models\User",
                'model_id' => $user->id,
            ]);

            model_has_permission::create([
                'permission_id' => 6,
                'model_type' => "App\Models\User",
                'model_id' => $user->id,
            ]);
        }
        elseif ($data['status'] == 7){
            model_has_role::create([
                'role_id' => 7,
                'model_type' => "App\Models\User",
                'model_id' => $user->id,
            ]);

            model_has_permission::create([
                'permission_id' => 7,
                'model_type' => "App\Models\User",
                'model_id' => $user->id,
            ]);
        }



        return $user;
    }
}
