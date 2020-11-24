<?php

namespace Tests\Feature\Api;

use App\Models\Product;
use App\Models\Tenant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * Error get all products
     *
     * @return void
     */
    public function testErrorGetAllProducts()
    {
        $tenant = 'fake_velue';

        $response = $this->getJson("/api/v1/products?token_company={$tenant}");

        $response->assertStatus(422);
    }

     /**
      * Get All Products
      *
      * @return void
      */
     public function testGetAllProducts()
     {
         $tenant = factory(Tenant::class)->create();

         $response = $this->getJson("/api/v1/products?token_company={$tenant->uuid}");

         //$response->dump();

         $response->assertStatus(200);
     }

      /**
      * test Not Found Products (404)
      *
      * @return void
      */
      public function testNotFoundProducts()
      {
          $products = 'fake_identify';
          $tenant = factory(Tenant::class)->create();

          $response = $this->getJson("/api/v1/products/{$products}?token_company={$tenant->uuid}");

          //$response->dump();

          $response->assertStatus(404);
      }

      /**
      * Get Product Identify
      *
      * @return void
      */
      public function testGetProductIdentify()
      {
        $tenant = factory(Tenant::class)->create();
        $product = factory(Product::class)->create();

        $response = $this->getJson("/api/v1/products/{$product->uuid}?token_company={$tenant->uuid}");

        //$response->dump();

        $response->assertStatus(200);
      }
}
