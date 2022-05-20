<?php

namespace App\Http\Controllers\Web;

use App\Http\Requests\Web\LoginRequest;
use App\Http\Requests\Web\ResetPasswordRequest;
use App\Http\Requests\Web\SendResetPasswordCodeRequest;
use App\Http\Services\Auth\AuthService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    /**
     * @var AuthService
     */
    private $service;

    /**
     * AuthController constructor.
     * @param AuthService $service
     */
    public function __construct (AuthService $service)
    {
        $this->service = $service;
    }

    /**
     * @return Application|Factory|View
     */
    public function signup (): View|Factory|Application
    {
        return view('auth.signup');
    }
}
