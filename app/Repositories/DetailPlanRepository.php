<?php

namespace App\Repositories;

use App\Interfaces\DetailPlanRepositoryInterface;
use App\Models\DetailPlan;
use App\Models\Plan;

class DetailPlanRepository implements DetailPlanRepositoryInterface
{
    public function __construct(protected  DetailPlan $entity)
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
