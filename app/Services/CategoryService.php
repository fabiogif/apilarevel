<?php

namespace App\Services;

use App\Interfaces\PlanRepositoryInterface;
use App\Interfaces\TenantRepositoryInterface;
use Illuminate\Support\Str;

class TenantService
{
    public function __construct(
        private readonly TenantRepositoryInterface $tenantRepositoryInterface,
        private readonly PlanRepositoryInterface $planRepositoryInterface)
    {}

    public function index()
    {
        return $this->tenantRepositoryInterface->index();
    }


    public function store(array $data)
    {
                $this->planRepositoryInterface->tenant()->create([
                    'name' => $data['name'],
                    'cnpj' => $data['cnpj'],
                    'url' => Str::kebab($data['empresa']) ,
                ]);

        return $this->tenantRepositoryInterface->store($data);
    }

    public function getById(int $id)
    {
        return $this->tenantRepositoryInterface->getById($id);
    }

    public function update(array $data, int $id)
    {
        return $this->tenantRepositoryInterface->update($data, $id);
    }

    public function delete(int $id)
    {
        return $this->tenantRepositoryInterface->delete($id);
    }

}
