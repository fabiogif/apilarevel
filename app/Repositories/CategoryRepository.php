<?php

namespace App\Repositories;

use App\Interfaces\CategoryRepositoryInterface;
use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function __construct(protected Category $entity)
    {
    }

    public function index()
    {
        return $this->entity->paginate(15);
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
