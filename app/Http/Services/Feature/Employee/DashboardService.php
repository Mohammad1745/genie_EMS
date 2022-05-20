<?php

namespace App\Http\Services\Feature\Employee;

use App\Http\Services\Base\EmployeeAttendanceService;
use App\Http\Services\Base\UserService;
use App\Http\Services\ResponseService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardService extends ResponseService
{
    /**
     * @var EmployeeAttendanceService
     */
    private EmployeeAttendanceService $employeeAttendanceService;


    /**
     * @param EmployeeAttendanceService $employeeAttendanceService
     */
    public function __construct (EmployeeAttendanceService $employeeAttendanceService)
    {
        $this->employeeAttendanceService = $employeeAttendanceService;
    }


}
