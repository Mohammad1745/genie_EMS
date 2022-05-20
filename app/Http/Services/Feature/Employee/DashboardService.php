<?php

namespace App\Http\Services\Feature\Employee;

use App\Http\Services\Base\EmployeeAttendanceService;
use App\Http\Services\Base\UserService;
use App\Http\Services\ResponseService;
use Carbon\Carbon;
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

    /**
     * @return array
     */
    public function checkIn (): array
    {
        try {
            $exists = $this->employeeAttendanceService->whereDate(Carbon::today());
            if(count($exists)){
                return $this->response()->success(__("Already Checked In"));
            }
            $time = Carbon::now();

            $this->employeeAttendanceService->create( $this->employeeAttendanceService->formatEmployeeCheckInData($time));

            return $this->response()->success(__("Successfully Checked In"));
        } catch (\Exception $exception) {
            return $this->response()->error( $exception->getMessage());
        }
    }

    /**
     * @return array
     */
    public function checkOut (): array
    {
        try {
            $data = $this->employeeAttendanceService->whereDate(Carbon::today());
            if(count($data)==0){
                return $this->response()->success(__("You are not checked in"));
            }
            $data = $data[0];
            if (!is_null($data->check_out)) {
                return $this->response()->success(__("Already checked out."));
            }

            $this->employeeAttendanceService->update( $data->id, $this->employeeAttendanceService->formatEmployeeCheckOutData($data->check_in));

            return $this->response()->success(__("Successfully Checked out"));
        } catch (\Exception $exception) {
            return $this->response()->error( $exception->getMessage());
        }
    }
}
