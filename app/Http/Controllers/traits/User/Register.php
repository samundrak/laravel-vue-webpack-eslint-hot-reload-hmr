<?php
namespace App\Http\Controllers\Traits;

use Illuminate\Foundation\Auth\RegistersUsers;
use Validator;

trait Register
{
    use RegistersUsers;

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'contact_mobile' => 'required|max:10',
            'username' => 'required|max:30|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }
}