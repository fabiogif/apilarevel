<?php

namespace App\Http\Controllers;

use App\Services\TenantService;

class TenantController extends Controller
{
    public function __construct(private readonly TenantService $tenantService)
    {
    }

    public function index()
    {
        return $this->tenantService->index();
    }
}
