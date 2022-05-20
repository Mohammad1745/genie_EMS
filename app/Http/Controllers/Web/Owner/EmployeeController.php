<?php

namespace App\Http\Controllers\Web\Owner;

use App\Http\Controllers\Controller;
use App\Http\Services\Feature\Owner\EmployeeService;

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

    public function index ()
    {
        return view('owner.employee');
    }
}
