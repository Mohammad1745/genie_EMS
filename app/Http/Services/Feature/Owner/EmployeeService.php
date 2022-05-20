<?php

namespace App\Http\Services\Feature\Owner;

use App\Http\Services\Base\UserService;
use App\Http\Services\ResponseService;

class EmployeeService extends ResponseService
{
    /**
     * @var UserService
     */
    private UserService $userService;

    /**
     * AuthService constructor.
     * @param UserService $userService
     */
    public function __construct (UserService $userService)
    {
        $this->userService = $userService;
    }
}
