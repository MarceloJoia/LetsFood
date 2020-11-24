<?php

namespace Tests\Feature\Api;

use App\Models\Tenant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TenantTest extends TestCase
{
    /**
     * Test get all Tenant
     *
     * @return void
     */
    public function testGetAllTenants()
    {
        //Tenant::truncate();//apaga a tabela de Tenant
        factory(Tenant::class, 10)->create();

        $response = $this->getJson('/api/v1/tenants');

        //$response->dump();

        $response->assertStatus(200)
                    ->assertJsonCount(10, 'data');
    }

    /**
     * Test get error single Tenant
     *
     * @return void
     */
    public function testGetTenantByIdentify()
    {
        $tenant = factory(Tenant::class)->create();

        $response = $this->getJson("/api/v1/tenants/{$tenant->uuid}");

        //$response->dump();

        $response->assertStatus(200);
    }
}
