<?php

namespace App\Http\Controllers;

use App\Classes\ApiResponseClass;
use App\Http\Requests\StorePlanRequest;
use App\Http\Resources\PlanResource;
use App\Services\PlanService;
use Illuminate\Http\Request;

class PlanController extends Controller
{
  public function __construct(private readonly PlanService $planService)
  {
  }
  public function index(){
      $plans =  $this->planService->index();
      return ApiResponseClass::sendResponse(PlanResource::collection($plans), '', 200);
  }

    public function store(StorePlanRequest $request)
    {
        try{
            $plans = $this->planService->store($request->all());
            return ApiResponseClass::sendResponse(new PlanResource($plans), 'Plano adicionado com sucesso', 200);
        } catch (\Exception $ex){
            return ApiResponseClass::rollback($ex);
        }

    }

    public function show($id)
    {
        $plan = $this->planService->getById($id);
        return ApiResponseClass::sendResponse(new PlanResource($plan),'',200);
    }

    public function delete($id)
    {
        try {
            $plan = $this->planService->delete($id);

            if($plan > 0){
                return ApiResponseClass::sendResponse('', 'Plano deletado com sucesso', 204);
            }

        } catch (\Exception $ex){
            return ApiResponseClass::rollback($ex);
        }
    }
}
