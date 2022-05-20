<?php

namespace App\Http\Controllers\Web\Owner;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Owner\StoreEmployeeRequest;
use App\Http\Services\Feature\Owner\ReportService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ReportController extends Controller
{
    /**
     * @var ReportService
     */
    private ReportService $service;

    /**
     * AuthController constructor.
     * @param ReportService $service
     */
    public function __construct (ReportService $service)
    {
        $this->service = $service;
    }

    /**
     * @return Factory|View|Application
     */
    public function index (): Factory|View|Application
    {
        $data['reports'] = $this->service->report();
        return view('owner.report.index', $data);
    }
}
