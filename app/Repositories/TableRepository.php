<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class TableRepository
{
    protected $table;

    public function __construct()
    {
        $this->table = 'tables';
    }

    public function getTablesByTenantUuid(string $uuid)
    {
        return DB::table($this->table)
                ->join('tenants','tenants.id', '=', 'tables.tenant_id')
                ->where('tenants.uuid', $uuid)
                ->select('tables.*')
                ->get();
    }

    public function getTablesByTenantId(int $idTenant)
    {
        return DB::table($this->table)
                    ->where('tenant_id', $idTenant)
                    ->get();
    }

    /**
     * Get Table by Identity
     */
    public function getTableByIdentify(string $identify)
    {
        return DB::table($this->table)
                    ->where('identify', $identify)
                    ->first();
    }
}
