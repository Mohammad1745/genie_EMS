<?php


namespace App\Http\Services\Base;


use App\Http\Repositories\UserRepository;
use App\Http\Services\Service;
use Illuminate\Support\Facades\Hash;

class UserService extends Service
{
    /**
     * UserService constructor.
     * @param UserRepository $repository
     */
    public function __construct (UserRepository $repository)
    {
        parent::__construct( $repository);
    }

    /**
     * @param array $data
     * @param string $randNo
     * @return array
     */
    public function formatUserDataForSignup (array $data, string $randNo): array
    {
        if ($data){
            return array(
                'username' => $data['username'],
                'email' => $data['email'],
                'verification_code' => $randNo,
                'password' => Hash::make($data['password']),
                'role' => OWNER_ROLE,
            );
        }
        return [];
    }

    /**
     * @param array $data
     * @return array
     */
    public function formatUserDataAsEmployee (array $data): array
    {
        if ($data){
            return array(
                'username' => $data['username'],
                'email' => $data['email'],
                'email_verified' => true,
                'password' => Hash::make($data['password']),
                'role' => EMPLOYEE_ROLE,
            );
        }
        return [];
    }
}
