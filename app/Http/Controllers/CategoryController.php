<?php

namespace App\Http\Controllers;

use App\Classes\ApiResponseClass;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Services\CategoryService;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    public function __construct(protected  CategoryService $categoryService){}


    public function index():JsonResponse
    {
        $data =  $this->categoryService->index();
        return ApiResponseClass::sendResponse(CategoryResource::collection($data), '', 200);

    }

    public function store(StoreCategoryRequest $request):JsonResponse
    {
        try {
            $category = $this->categoryService->store($request->all());
            return ApiResponseClass::sendResponse(new CategoryResource($category), 'Categoria cadastrada com sucesso', 201);
        } catch (\Exception $ex) {
            return ApiResponseClass::rollback($ex);
        }
    }
}
