<?php

namespace App\Services;

use App\Interfaces\ProductRepositoryInterface;

class ProductService
{


    public function __construct(private ProductRepositoryInterface $productRepositoryInterface)
    {}


    public function index()
    {
        return $this->productRepositoryInterface->index();
    }

    public function getProductById(int $id)
    {
        return $this->productRepositoryInterface->getById($id);
    }
    

    public function store(array $data)
    {
        return $this->productRepositoryInterface->store($data);
    }

    public function getById(int $id)
    {
        return $this->productRepositoryInterface->getById($id);
    }

    public function update(array $data, int $id)
    {
        return $this->productRepositoryInterface->update($data, $id);
    }

    public function delete(int $id)
    {
        return $this->productRepositoryInterface->delete($id);
    }
}