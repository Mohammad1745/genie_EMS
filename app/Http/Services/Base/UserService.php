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
     * @param string $provider
     * @return array
     */
    public function formatUserDataForSignup (array $data, string $provider): array
    {
        if ($data){
            return array(
                'name' => $data['name'],
                'email' => $data['email'],
                'avatar' => $data['avatar'],
                'provider' => $provider,
                'provider_id' => $data['id'],
                'role' => $data['role'] ? $data['role'] : OWNER_ROLE,
            );
        }
        return [];
    }
}
