<?php

namespace App\Http\Controllers\Web\Owner;

use App\Http\Controllers\Controller;
use App\Http\Requests\Request;
use App\Http\Requests\Web\Owner\StoreEmployeeRequest;
use App\Http\Services\Feature\Owner\ReportService;
use Carbon\Carbon;
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
     * @param Request $request
     * @return Factory|View|Application
     */
    public function index (Request $request): Factory|View|Application
    {
        $data['date'] = $value = $request->query('date') ?
            $request->query('date') :
            Carbon::now()->format('d-m-Y');
        $data['dates'] = $this->service->dateList();
        $data['reports'] = $this->service->report($data['date']);
        return view('owner.report.index', $data);
    }
}
