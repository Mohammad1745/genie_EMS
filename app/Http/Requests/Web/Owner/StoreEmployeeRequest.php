<?php

namespace App\Http\Requests\Web\Owner;

use App\Http\Requests\Request;

class StoreEmployeeRequest extends Request
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
