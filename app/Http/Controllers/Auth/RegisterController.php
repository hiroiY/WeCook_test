<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
<<<<<<< HEAD
=======
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Log;
>>>>>>> 77b54b46424960bdd2cf7ccfb3a2614090b111f9

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
    protected $redirectTo = '/home';

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
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
<<<<<<< HEAD
        ]);
    }
=======
            'role_id' => User::USER_ROLE_ID,
            'avatar' => 'default_avatar.png',
        ]);
    }

    public function register(Request $request)
    {
        Log::info('Registration data:', $request->all());
        $validator = $this->validator($request->all());
        if ($validator->fails()) {
            Log::info('Validation failed:', $validator->errors()->all());
        } else {
            Log::info('Validation passed.');
        }
        $validator->validate();
        event(new Registered($user = $this->create($request->all())));
        Log::info('Registered event called.');
        $this->guard()->login($user);
        Log::info('User logged in.');
        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }
>>>>>>> 77b54b46424960bdd2cf7ccfb3a2614090b111f9
}
