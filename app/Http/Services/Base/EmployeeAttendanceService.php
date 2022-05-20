<?php


namespace App\Http\Services\Base;


use App\Http\Repositories\EmployeeAttendanceRepository;
use App\Http\Services\Service;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
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
    public function formatEmployeeCheckInData (string $time): array
    {
        if ($time){
            return array(
                'employee_id' => Auth::user()->employee->id,
                'check_in' => $time,
            );
        }
        return [];
    }

    /**
     * @param string $checkIn
     * @return array
     */
    public function formatEmployeeCheckOutData (string $checkIn): array
    {
        if ($checkIn){
            $check_out = Carbon::now();
            $check_in = new Carbon($checkIn);
            $officeHour = $check_in->diffInMinutes($check_out)/60;

            return array(
                'check_out' => $check_out,
                'office_hour' => $officeHour
            );
        }
        return [];
    }
}
