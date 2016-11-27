<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Traits\Register;
use App\Profiyo\Service\User;
use App\Http\Controllers\Controller;
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

    use Register;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    /**
     * @var User
     */
    private $user;

    /**
     * Create a new controller instance.
     *
     * @param User $user
     * @internal param Validator $validator
     */
    public function __construct(User $user)
    {
        $this->middleware('guest');
        $this->user = $user;
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(array $data)
    {
        return $this->user->register($data);
    }
}
