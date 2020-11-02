<?php

namespace App\Repositories;

use App\Repositories\Contracts\ProductRepositoryInterface;
use Illuminate\Support\Facades\DB;

class ProductRepository implements ProductRepositoryInterface
{
    protected $table;

    public function __construct()
    {
        $this->table = 'products';
    }

    public function getProductsByTenantId(int $idTenant, array $categories)
    {
        return DB::table($this->table)
                    ->join('category_product', 'category_product.product_id', '=', 'products.id')//Amarei a category_product com o Products
                    ->join('categories', 'category_product.category_id', '=', 'categories.id')//Categorias amarrada com a tabela category_product
                    ->where('products.tenant_id', $idTenant)    //Products amarrado pelo tenant_id
                    ->where('categories.tenant_id', $idTenant)  //Categories amarrado pelo tenant_id
                    ->where(function($query) use($categories) {
                        if ($categories != []) {
                            $query->whereIn('categories.url', $categories);    // Onde a Categoria.URL esteja no $categories
                        }
                    })
                    ->get();
    }


    public function getProductByFlag(string $flag)
    {
        return DB::table($this->table)
                    ->where('products.flag', $flag)
                    ->first();
    }
}
