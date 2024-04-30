<?php

namespace App\Repositories;

use App\Interfaces\TenantRepositoryInterface;
use App\Models\Product;

class CategoryRepository implements TenantRepositoryInterface
{
    public function __construct(protected Product $entity)
    {
    }

    public function index()
    {
        return $this->entity->all();
    }

     public function getById($id)
     {
        return $this->entity->findOrFail($id);
     }
     public function store(array $data)
     {
        return $this->entity->create($data);
     }

     public function update(array $data, $id)
     {
        return $this->entity->whereId($id)->update($data);
     }

     public function delete($id)
     {
         return $this->entity->destroy($id);
     }


}
