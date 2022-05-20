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
     * @return array
     */
    public function formatUserDataForSignup (array $data, string $randNo): array
    {
        if ($data){
            return array(
                'username' => $data['username'],
                'email' => $data['email'],
                'verification_code' => $randNo,
                'password' => $data['password'],
                'role' => OWNER_ROLE,
            );
        }
        return [];
    }
}
