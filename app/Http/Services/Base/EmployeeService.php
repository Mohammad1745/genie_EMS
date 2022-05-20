<?php


namespace App\Http\Services\Base;


use App\Http\Repositories\EmployeeRepository;
use App\Http\Services\Service;
use Illuminate\Support\Facades\Hash;

class EmployeeService extends Service
{
    /**
     * UserService constructor.
     * @param EmployeeRepository $repository
     */
    public function __construct (EmployeeRepository $repository)
    {
        parent::__construct( $repository);
    }

    public function formatEmployeeData (int $userId, int $ownerId): array
    {
        if ($userId && $ownerId){
            return array(
                'user_id' => $userId,
                'owner_id' => $ownerId,
            );
        }
        return [];
    }
}
