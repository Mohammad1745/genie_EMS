<?php

namespace App\Http\Services\Feature\Auth;

use App\Http\Services\Base\UserService;
use App\Http\Services\ResponseService;
use Illuminate\Support\Facades\Auth;
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
    public function loginProcess (object $request): array
    {
        try {
            if (Auth::attempt( $this->_credentials( $request->only('email', 'password')))){

                return $this->response()->success('Logged In Successfully.');
            } else {
                return $this->response()->error('Wrong Email Or Password');
            }
        } catch (\Exception $exception) {
            return $this->response()->error( $exception->getMessage());
        }
    }

    /**
     * @return array
     */
    public function logOut(): array
    {
        Auth::logout();
        session()->flush();

        return $this->response()->error('Logged out successfully');
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

            return $this->response()->success(__("Successfully signed up ."));
        } catch (\Exception $exception) {
            DB::rollBack();

            return $this->response()->error( $exception->getMessage());
        }
    }


    /**
     * @param array $data
     * @return array
     */
    private function _credentials (array $data) : array {
        return filter_var( $data['email'], FILTER_VALIDATE_EMAIL) ? [
            'email' => $data['email'],
            'password' => $data['password']
        ] : [
            'username' => $data['email'],
            'password' => $data['password']
        ];
    }

}
