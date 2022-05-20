<?php

namespace App\Http\Services\Feature\Owner;

use App\Http\Services\Base\EmployeeAttendanceService;
use App\Http\Services\Base\UserService;
use App\Http\Services\ResponseService;
use Carbon\Carbon;
use DateInterval;
use DatePeriod;
use DateTime;
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
    /**
     * @var EmployeeAttendanceService
     */
    private EmployeeAttendanceService $employeeAttendanceService;

    /**
     * AuthService constructor.
     * @param UserService $userService
     * @param \App\Http\Services\Base\EmployeeService $employeeService
     * @param EmployeeAttendanceService $employeeAttendanceService
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
    public function dateList (): array
    {
        try {
            $firstAttendance = $this->employeeAttendanceService->firstWhere([]);
            $lastAttendance = $this->employeeAttendanceService->lastWhere([]);
            return date_range($firstAttendance->created_at, $lastAttendance->created_at, 'd-m-Y');
        } catch (\Exception $exception) {
            return [];
        }
    }

    /**
     * @param string $date
     * @return array
     */
    public function report (string $date): array
    {
        try {
            $data = [];
            $employees = Auth::user()->employees->all();

            foreach ($employees as $employee) {
                $user = $employee->user;
                $attendanceData = $this->employeeAttendanceService->whereDate(Carbon::parse($date), ['employee_id' => $employee->id]);
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