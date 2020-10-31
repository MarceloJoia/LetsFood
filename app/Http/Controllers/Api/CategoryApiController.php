<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\TenantFormRequest;
use App\Http\Resources\CategoryResource;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class CategoryApiController extends Controller
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function categoriesByTenant(TenantFormRequest $request)
    {
        /* if (!$request->token_company){
            return response()->json(['message' => 'Token Not Found!'], 404);
        } */
        $categories = $this->categoryRepository->getCategoriesByTenantUuid($request->token_company);

        return CategoryResource::collection($categories);
    }

    public function show(TenantFormRequest $request, $urlCategory)
    {
        if (!$category = $this->categoryRepository->getCategoryByUrl($urlCategory)){
            return response()->Json(['message' => 'Category Not Found!'], 404);
        }

        return new CategoryResource($category);
    }
}
