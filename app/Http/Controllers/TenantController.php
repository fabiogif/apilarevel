<?php

namespace App\Http\Controllers;

use App\Classes\ApiResponseClass;
use App\Http\Requests\StoreTenantRequest;
use App\Http\Resources\TenantResource;
use App\Services\TenantService;
use Illuminate\Http\JsonResponse;

class TenantController extends Controller
{
    public function __construct(private readonly TenantService $tenantService)
    {
    }

    public function index()
    {
        return $this->tenantService->index();
    }
    public function store(StoreTenantRequest $request):JsonResponse
    {
        try {
            $tenant = $this->tenantService->store($request->all());
            return ApiResponseClass::sendResponse(new TenantResource($tenant), 'Empresa cadastrada com sucesso', 201);
        } catch (\Exception $ex) {
            return ApiResponseClass::rollback($ex);
        }
    }
}
