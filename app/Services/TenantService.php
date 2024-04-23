<?php

namespace App\Services;

use App\Interfaces\TenantRepositoryInterface;

class TenantService
{
    public function __construct(private readonly TenantRepositoryInterface $tenantRepositoryInterface)
    {}

    public function index()
    {
        return $this->tenantRepositoryInterface->index();
    }


    public function store(array $data)
    {
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

    public function getAllTenants()
    {
        return $this->tenantRepositoryInterface->getAllTenants();
    }
}
