<?php

namespace App\Http\Services\Feature\Auth;

use App\Http\Services\Base\UserService;
use App\Http\Services\ResponseService;
use Illuminate\Http\RedirectResponse as RedirectResponseAlias;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\RedirectResponse;

class AuthService extends ResponseService
{
    /**
     * @var UserService
     */
    private $userService;

    /**
     * AuthService constructor.
     * @param UserService $userService
     */
    public function __construct (UserService $userService)
    {
        $this->userService = $userService;
    }


}
