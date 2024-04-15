<?php

namespace App\Http\Controllers;

use App\Classes\ApiResponseClass;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Service\ProductService;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    public function __construct(private ProductService $productService)
    {
    }
 
    public function index()
    {
        $data = $this->productService->index();
        return ApiResponseClass::sendResponse(ProductResource::collection($data),'',200);
    }


    public function create(StoreProductRequest $request)
    {
       
    }
    public function edit(Product $product)
    {
      
    }
    public function store(StoreProductRequest $request)
    {
        $details = ['name' => $request->name, 'detail'=> $request->details];

        DB::beginTransaction();
        try{
             $product = $this->productService->store($details);

             DB::commit();
             return ApiResponseClass::sendResponse(new ProductResource($product),'Produto cadastrado com sucesso',201);

        }catch(\Exception $ex){
            return ApiResponseClass::rollback($ex);
        }
    }


    public function show($id)
    {
        $product = $this->productService->getById($id);

        return ApiResponseClass::sendResponse(new ProductResource($product),'',200);
    }


    public function update(UpdateProductRequest $request, $id)
    {
        $updateDetails =[
            'name' => $request->name,
            'details' => $request->details
        ];
        DB::beginTransaction();
        try{
             $product = $this->productService->update($updateDetails,$id);

             DB::commit();
             return ApiResponseClass::sendResponse('Produto atualizado com sucesso','',201);

        }catch(\Exception $ex){
            return ApiResponseClass::rollback($ex);
        }
    }

 
    public function destroy($id)
    {
        $this->productService->delete($id);

        return ApiResponseClass::sendResponse('Produto removido com sucesso','',204);
    }
}
