<?php

namespace Tests\Feature;

use App\Models\Table;
use App\Models\Tenant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TableTest extends TestCase
{
    /**
     * Get all Tables by tenant Error
     *
     * @return void
     */
    public function testGetAllTablesByTenantError()
    {
        $response = $this->getJson('/api/v1/tables');

        //$response->dump();

        $response->assertStatus(422);
    }

     /**
      * get all tables by Tenant
      *
      * @return void
      */
     public function testGetAllTablesByTenant()
     {
         $tenant = factory(Tenant::class)->create();

         $response = $this->getJson("/api/v1/tables/?token_company={$tenant->uuid}");

         //$response->dump();

         $response->assertStatus(200);
     }

     /**
      * Error get table by tenant
      *
      * @return void
      */
     public function testErrorGetTableByTenant()
     {
         $table = 'faker_value';
         $tenant = factory(Tenant::class)->create();
         $response = $this->getJson("/api/v1/tables/{$table}?token_company={$tenant->uuid}");
         $response->assertStatus(404);
     }

     /**
      * get table by tenant
      *
      * @return void
      */
     public function testGetTableByTenant()
     {
         $table = factory(Table::class)->create();

         $tenant = factory(Tenant::class)->create();

         $response = $this->getJson("/api/v1/tables/{$table->uuid}?token_company={$tenant->uuid}");

         //$response->dump();

         $response->assertStatus(200);
     }
}
