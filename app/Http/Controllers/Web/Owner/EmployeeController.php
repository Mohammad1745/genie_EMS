<?php

namespace App\Http\Controllers\Web\Owner;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Owner\StoreEmployeeRequest;
use App\Http\Services\Feature\Owner\EmployeeService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class EmployeeController extends Controller
{
    /**
     * @var EmployeeService
     */
    private EmployeeService $service;

    /**
     * AuthController constructor.
     * @param EmployeeService $service
     */
    public function __construct (EmployeeService $service)
    {
        $this->service = $service;
    }

    /**
     * @return Factory|View|Application
     */
    public function index (): Factory|View|Application
    {
        $data['employees'] = $this->service->employeeList();
        return view('owner.employee.index', $data);
    }

    /**
     * @return Factory|View|Application
     */
    public function create (): Factory|View|Application
    {
        return view('owner.employee.add');
    }

    /**
     * @param StoreEmployeeRequest $request
     * @return RedirectResponse
     */
    public function store(StoreEmployeeRequest $request): RedirectResponse
    {
        return $this->webResponse( $this->service->storeEmployee( $request), 'owner.employee');
    }
}
