<?php

namespace App\Repositories;

use App\Models\Tenant;
use App\Repositories\Contracts\TenantRepositoryInterface;

class TenantRepository implements TenantRepositoryInterface
{
    // Laravel e Eloquent ORM
    protected $entity;//entidade

    public function __construct(Tenant $tenant)
    {
        $this->entity = $tenant;
    }

    /**
     * Get all Tenants
     */
    public function getAllTenants(int $per_page)
    {
        return $this->entity->paginate($per_page);
    }

    public function getTenantByUuid(string $uuid)
    {
        return $this->entity
                        ->where('uuid', $uuid)
                        ->first();
    }
}
