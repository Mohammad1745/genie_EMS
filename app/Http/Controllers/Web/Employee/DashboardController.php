<?php

namespace App\Http\Controllers\Web\Employee;

use App\Http\Controllers\Controller;
use App\Http\Services\Feature\Employee\DashboardService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * @var DashboardService
     */
    private DashboardService $service;

    /**
     * AuthController constructor.
     * @param DashboardService $service
     */
    public function __construct (DashboardService $service)
    {
        $this->service = $service;
    }

    /**
     * @return Factory|View|Application
     */
    public function index (): Factory|View|Application
    {
        return view('employee.dashboard.index');
    }
}
