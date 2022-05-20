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

    /**
     * @param array $data
     * @return array
     */
    public function formatEmployeeData (array $data): array
    {
        if ($data){
            return array(
                'user_id' => $data['user_id'],
                'owner_id' => $data['owner_id'],
            );
        }
        return [];
    }
}
