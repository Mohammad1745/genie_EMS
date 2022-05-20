<?php

namespace App\Http\Services\Feature\Auth;

use App\Http\Services\Base\UserService;
use App\Http\Services\ResponseService;
use Illuminate\Support\Facades\DB;

class AuthService extends ResponseService
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

    /**
     * @param object $request
     * @return array
     */
    public function signupProcess (object $request): array
    {
        try {
            DB::beginTransaction();
            $randNo = randomNumber(6);
            $user = $this->userService->create( $this->userService->formatUserDataForSignup( $request->all(), $randNo));

            DB::commit();

            return $this->response()->success(__("Successfully signed up as a ". userRoles( $user->role).". Verification Code has been sent to ".$user->email."."));
        } catch (\Exception $exception) {
            DB::rollBack();

            return $this->response()->error( $exception->getMessage());
        }
    }

}
