<?php

namespace App\Http\Services\Feature\Owner;

use App\Http\Services\Base\EmployeeAttendanceService;
use App\Http\Services\Base\UserService;
use App\Http\Services\ResponseService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReportService extends ResponseService
{
    /**
     * @var UserService
     */
    private UserService $userService;
    /**
     * @var \App\Http\Services\Base\EmployeeService
     */
    private \App\Http\Services\Base\EmployeeService $employeeService;
    private EmployeeAttendanceService $employeeAttendanceService;

    /**
     * AuthService constructor.
     * @param UserService $userService
     * @param \App\Http\Services\Base\EmployeeService $employeeService
     */
    public function __construct (UserService $userService, \App\Http\Services\Base\EmployeeService $employeeService, EmployeeAttendanceService $employeeAttendanceService)
    {
        $this->userService = $userService;
        $this->employeeService = $employeeService;
        $this->employeeAttendanceService = $employeeAttendanceService;
    }

    /**
     * @return array
     */
    public function report (): array
    {
        try {
            $data = [];
            $employees = Auth::user()->employees->all();

            foreach ($employees as $employee) {
                $user = $employee->user;
                $attendanceData = $this->employeeAttendanceService->whereDate(Carbon::today(), ['employee_id' => $employee->id]);
                $checkIn = "Not Checked In";
                $checkOut = "Not Checked In";
                $officeHour = 0;
                if(count($attendanceData)>0){
                    $checkIn = (new Carbon($attendanceData[0]->check_in))->format('g:i A');
                    if (!is_null($attendanceData[0]->check_out)) {
                        $checkOut = (new Carbon($attendanceData[0]->check_out))->format('g:i A');
                        $officeHour = $attendanceData[0]->office_hour<1 ?
                            $attendanceData[0]->office_hour*60 ." Minutes"
                            : $attendanceData[0]->office_hour ." Hours";
                    }
                }

                $data[] = [
                    'id' => $employee->id,
                    'username' => $user->username,
                    'check_in' => $checkIn,
                    'check_out' => $checkOut,
                    'office_hour' => $officeHour,
                ];
            }

            return $data;
        } catch (\Exception $exception) {
            return [];
        }
    }
}
