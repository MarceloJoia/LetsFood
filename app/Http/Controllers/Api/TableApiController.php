<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Http\Requests\Api\TenantFormRequest;
use App\Http\Resources\TableResource;
use App\Repositories\TableRepository;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class TableApiController extends Controller
{
    protected $tableRepository;

    public function __construct(TableRepository $tableRepository)
    {
        $this->tableRepository = $tableRepository;
    }

    public function tablesByTenant(TenantFormRequest $request)
    {
        /* if (!$request->token_company){
            return response()->json(['message' => 'Token Not Found!'], 404);
        } */
        $categories = $this->tableRepository->getTablesByTenantUuid($request->token_company);

        return TableResource::collection($categories);
    }

    public function show(TenantFormRequest $request, $identify)
    {
        if (!$table = $this->tableRepository->getTableByIdentify($identify)){
            return response()->Json(['message' => 'Table Not Found!'], 404);
        }

        return new TableResource($table);
    }
}
