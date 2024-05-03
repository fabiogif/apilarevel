<?php

namespace App\Http\Controllers;

use App\Classes\ApiResponseClass;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\{StoreProductRequest, UpdateProductRequest};
use App\Http\Resources\ProductResource;
use App\Services\ProductService;

class ProductController extends Controller
{

    public function __construct(private readonly ProductService $productService)
    {
    }

    public function index(): JsonResponse
    {
        $data = $this->productService->index();
        return ApiResponseClass::sendResponse(ProductResource::collection($data), '', 200);
    }

    public function store(StoreProductRequest $request):JsonResponse
    {
        try {
            $product = $this->productService->store($request->all());
            return ApiResponseClass::sendResponse(new ProductResource($product), 'Produto cadastrado com sucesso', 201);
        } catch (\Exception $ex) {
            return ApiResponseClass::rollback($ex);
        }
    }

    public function show($id):JsonResponse
    {
        $product = $this->productService->getById($id);
        return ApiResponseClass::sendResponse(new ProductResource($product), '', 200);
    }

    public function update(UpdateProductRequest $request, $id):JsonResponse
    {
        try {
            $this->productService->update($request->all(), $id);
            return ApiResponseClass::sendResponse('Produto atualizado com sucesso', '', 201);
        } catch (\Exception $ex) {
            return ApiResponseClass::rollback($ex);
        }
    }

    public function delete($id):JsonResponse
    {
        try {
            $product = $this->productService->delete($id);
            return ApiResponseClass::sendResponse(new ProductResource($product), 'Produto removido com sucesso',204);

        } catch (\Exception $ex) {
            return ApiResponseClass::rollback($ex);
        }
    }
}
