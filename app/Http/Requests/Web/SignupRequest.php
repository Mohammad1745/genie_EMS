<?php

namespace App\Http\Requests\Web;

use App\Http\Requests\Request;

class SignupRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules ():array
    {
        return [
            'username' => 'required|string|unique:App\Models\User,username',
            'email' => 'required|email|unique:App\Models\User,email',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required',
        ];
    }
}
