<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryProductController extends Controller
{
    protected $product, $category;

    public function __construct(Product $product, Category $category)
    {
        $this->product = $product;
        $this->category = $category;

        $this->middleware('can:Produtos');
    }

    /**
     * Show Categorys
     */
    public function categories($idProduct)
    {
        if(!$product = $this->product->find($idProduct)){
            return redirect()->back();
        }

        //$categories = $product->categories;
        $categories = $product->categories()->paginate();

        return view('admin.pages.products.categories.categories', compact('product','categories'));
    }

    /**
     * Show ProductattachCategoriesProduct
     */
    public function products($idCategory)
    {
        if(!$category = $this->category->find($idCategory)){
            return redirect()->back();
        }

        $products = $category->products()->paginate();

        return view('admin.pages.categories.products.products', compact('categories','products'));
    }


    /**
     * atrelar as permições aos perfis
     */
    public function categoriesAvailable(Request $request, $idProduct)
    {
        if(!$product = $this->product->find($idProduct)){
            return redirect()->back();
        }

        // Search categories
        $filters = $request->except('_token');

        $categories = $product->categoriesAvailable($request->filter);

        return view('admin.pages.products.categories.available', compact('product', 'categories', 'filters'));
    }

    public function attachCategoriesProduct(Request $request, $idProduct)
    {
        if(!$product = $this->product->find($idProduct)){
            return redirect()->back();
        }

        if(!$request->categories || count($request->categories) == 0){
            return redirect()
                    ->back()
                    ->with('warning', 'Escolha um tipo de permissão.');
        }

        $product->categories()->attach($request->categories);

        return redirect()->route('products.categories', $product->id);
    }

    /**
     * Detach category product
     */
    public function detachCategoryProduct($idProduct, $idCategory)
    {
        $product = $this->product->find($idProduct);
        $category = $this->category->find($idCategory);

        if(!$product || !$category){
            return redirect()->back();
        }

        $product->categories()->detach($category);

        return redirect()->route('products.categories', $product->id);
    }
}
