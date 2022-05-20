<?php

namespace App\Http\Requests\Web;

use App\Http\Requests\Request;

class LoginRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules ():array
    {
        return [
            'email' => 'required|string',
            'password' => 'required',
        ];
    }
}
