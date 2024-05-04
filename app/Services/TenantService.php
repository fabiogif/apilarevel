<?php

namespace App\Services;

use App\Interfaces\PlanRepositoryInterface;
use App\Interfaces\TenantRepositoryInterface;
use Illuminate\Support\Str;
use App\Models\Plan;

class TenantService
{
    public function __construct(
        private readonly TenantRepositoryInterface $tenantRepositoryInterface,
        protected Plan $plan, protected array $data,
        private readonly PlanRepositoryInterface $planRepositoryInterface){}

    public function index()
    {
        return $this->tenantRepositoryInterface->index();
    }


    public function store(array $data)
    {

        $tenant = $this->createTenant($data);
       return $this->createUser($tenant);

        //return $this->tenantRepositoryInterface->store($data);
    }

    public function createTenant(array $data)
    {

        $plan = $this->planRepositoryInterface->getById($data['plan_id']);
        $this->plan = $plan;
        $this->data = $data;

      return   $this->planRepositoryInterface->tenant()->create([
            'name' => $data['name'],
            'cnpj' => $data['cnpj'],
            'url' => Str::kebab($data['name']) ,
            'email' => $data['email'],
            'subscription' => now(),
            'expires_at' => now()->addDays(7),
        ]);
    }

    public function createUser($tenant)
    {
       return $tenant->users()->create([
            'name' => $this->data['name'],
            'email' => $this->data['email'],
            'password' => bcrypt($this->data['password']),
        ]);

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
