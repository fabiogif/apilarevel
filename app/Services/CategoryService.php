<?php

namespace App\Services;

use App\Interfaces\CategoryRepositoryInterface;

readonly  class CategoryService
{
    public function __construct(private CategoryRepositoryInterface $categoryRepositoryInterface)
    {}

    public function index()
    {
        return $this->categoryRepositoryInterface->index();
    }


    public function store(array $data)
    {
        return $this->categoryRepositoryInterface->store($data);
    }

    public function getById(int $id)
    {
        return $this->categoryRepositoryInterface->getById($id);
    }

    public function update(array $data, int $id)
    {
        return $this->categoryRepositoryInterface->update($data, $id);
    }

    public function delete(int $id)
    {
        return $this->categoryRepositoryInterface->delete($id);
    }

}
