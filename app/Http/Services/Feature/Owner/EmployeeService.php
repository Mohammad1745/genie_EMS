<?php

namespace App\Http\Services\Feature\Owner;

use App\Http\Services\Base\UserService;
use App\Http\Services\ResponseService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EmployeeService extends ResponseService
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
     * AuthService constructor.
     * @param UserService $userService
     * @param \App\Http\Services\Base\EmployeeService $employeeService
     */
    public function __construct (UserService $userService, \App\Http\Services\Base\EmployeeService $employeeService)
    {
        $this->userService = $userService;
        $this->employeeService = $employeeService;
    }

    /**
     * @return array
     */
    public function employeeList (): array
    {
        try {
            $data = [];
            $employees = Auth::user()->employees->all();

            foreach ($employees as $employee) {
                $user =$employee->user;

                $data[] = [
                    'id' => $employee->id,
                    'user_id' => $user->id,
                    'username' => $user->username
                ];
            }

            return $data;
        } catch (\Exception $exception) {
            return [];
        }
    }

    /**
     * @param object $request
     * @return array
     */
    public function storeEmployee (object $request): array
    {
        try {
            DB::beginTransaction();
            $user = $this->userService->create( $this->userService->formatUserDataAsEmployee( $request->all()));
            $employee = $this->employeeService->create( $this->employeeService->formatEmployeeData($user->id, Auth::id()));

            DB::commit();

            return $this->response()->success(__("Successfully added new employee."));
        } catch (\Exception $exception) {
            DB::rollBack();

            return $this->response()->error( $exception->getMessage());
        }
    }
}
