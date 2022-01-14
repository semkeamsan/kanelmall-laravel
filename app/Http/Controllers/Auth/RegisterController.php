<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserFormRequest;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $username = 'username';
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
        $this->redirectTo = route('front.account.index');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $rules = [
            'name' => ['required', 'string', 'min:6', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];

        if (is_numeric($data['email'])) {
            $this->username = 'phone';
            $rules['email'] = ['required', 'string', 'min:9', 'max:255', 'unique:users,' . $this->username];
        } elseif (filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $this->username = 'email';
            $rules['email'] = ['required', 'string', 'email', 'max:255', 'unique:users'];
        }


        $validator =  Validator::make($data, $rules, [], [
            'name' => __('Name'),
            'email' => __('Phone Number'),
            'password' => __('Password'),
        ]);
        return $validator;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            $this->username => $data['email'],
            'password' => Hash::make($data['password']),
            'avatar'  =>  asset('/images/avatar.png'),
        ]);
        return $user;
    }

    protected function registered(Request $request, User $user)
    {

        if ($user->email) {
           return redirect()->route('front.account.index');
        }elseif($user->phone){
            //$user->varifyByCall();
        }

    }
}
