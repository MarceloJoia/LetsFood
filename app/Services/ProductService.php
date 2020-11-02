<?php

namespace App\Services;

use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Repositories\Contracts\TenantRepositoryInterface;

class ProductService
{
    protected $tenantRepository, $productRepository;

    public function __construct(TenantRepositoryInterface $tenantRepository, ProductRepositoryInterface $productRepository)
    {
        $this->tenantRepository = $tenantRepository;
        $this->productRepository = $productRepository;
    }

    /**
     * Retorna Todos os Produtos
     */
    public function getProductsByTenantUuid(string $uuid, array $categories)
    {
        $tenant = $this->tenantRepository->getTenantByUuid($uuid);//retorna o Tenant

        return $this->productRepository->getProductsByTenantId($tenant->id, $categories);//Retorna os produtos desse Tenant
    }

    public function getProductByFlag(string $flag)
    {
        return $this->productRepository->getProductByFlag($flag);
    }
}
