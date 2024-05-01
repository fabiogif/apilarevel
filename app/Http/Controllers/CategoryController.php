<?php

namespace App\Http\Controllers;

use App\Classes\ApiResponseClass;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Services\CategoryService;

class CategoryController extends Controller
{
    public function __construct(protected  CategoryService $categoryService)
    {
    }


    public function index()
    {
        $data =  $this->categoryService->index();
        return ApiResponseClass::sendResponse(CategoryResource::collection($data), '', 200);

    }

    public function store(StoreCategoryRequest $request)
    {
        try {
            $category = $this->categoryService->store($request->all());
            return ApiResponseClass::sendResponse(new CategoryResource($category), 'Categoria cadastrada com sucesso', 201);
        } catch (\Exception $ex) {
            dd($ex);
            return ApiResponseClass::rollback($ex);
        }
    }
}
