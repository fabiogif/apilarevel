<?php

namespace App\Repositories;

use App\Interfaces\PlanRepositoryInterface;
use App\Models\{Plan,Tenant};

class PlanRepository implements PlanRepositoryInterface
{
    public function __construct(protected Plan $entity)
    {
    }

    public function index()
    {
        return $this->entity->all();
    }

     public function getById($id)
     {
        return $this->entity->where('id', $id)->first();
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

    public function tenant()
    {
        return $this->entity->hasMany(Tenant::class);
    }


}
