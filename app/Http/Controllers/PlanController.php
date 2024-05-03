<?php

namespace App\Http\Controllers;

use App\Classes\ApiResponseClass;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\{StorePlanRequest, UpdatePlanRequest};
use App\Http\Resources\PlanResource;
use App\Services\PlanService;

class PlanController extends Controller
{
    public function __construct(private readonly PlanService $planService)
    {
    }

    public function index():JsonResponse
    {
        $plans = $this->planService->index();
        return ApiResponseClass::sendResponse(PlanResource::collection($plans), '', 200);
    }

    public function store(StorePlanRequest $request):JsonResponse
    {
        try {
            $plans = $this->planService->store($request->all());
            return ApiResponseClass::sendResponse(new PlanResource($plans), 'Plano adicionado com sucesso', 200);
        } catch (\Exception $ex) {
            return ApiResponseClass::rollback($ex);
        }

    }

    public function update(UpdatePlanRequest $request, $id):JsonResponse
    {
        try {
            $this->planService->update($request->all(), $id);
            return ApiResponseClass::sendResponse('Plano atualizado com sucesso', '', 201);
        } catch (\Exception $ex) {
            return ApiResponseClass::rollback($ex);
        }
    }

    public function show($id):JsonResponse
    {
        $plan = $this->planService->getById($id);
        return ApiResponseClass::sendResponse(new PlanResource($plan), '', 200);
    }

    public function delete($id):JsonResponse
    {
        try {
            $this->planService->delete($id);

            return  ApiResponseClass::sendResponse('', 'Plano deletado com sucesso', 204);

        } catch (\Exception $ex) {
            return ApiResponseClass::rollback($ex);
        }
    }
}
