<?php

namespace App\Repositories\Contracts;

/**
 * Aqui assinatura de todos os Metodos
 */
interface TenantRepositoryInterface
{
    public function getAllTenants(int $per_page);
    public function getTenantByUuid(string $uuid);
}
