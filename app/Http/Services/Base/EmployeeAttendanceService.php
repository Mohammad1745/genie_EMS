<?php


namespace App\Http\Services\Base;


use App\Http\Repositories\EmployeeAttendanceRepository;
use App\Http\Services\Service;
use Illuminate\Support\Facades\Hash;

class EmployeeAttendanceService extends Service
{
    /**
     * UserService constructor.
     * @param EmployeeAttendanceRepository $repository
     */
    public function __construct (EmployeeAttendanceRepository $repository)
    {
        parent::__construct( $repository);
    }

    /**
     * @param string $time
     * @return array
     */
    public function formatEmployeeAttendanceData (string $time): array
    {
        if ($time){
            return array(
                'check_in' => $time,
            );
        }
        return [];
    }
}
