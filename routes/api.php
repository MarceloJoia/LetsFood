<?php

/**
 * Endpoint tenants
 */
Route::get('/tenants/{uuid}', 'Api\TenantApiController@show');
Route::get('/tenants', 'Api\TenantApiController@index');

/**
 * Endpoint Categorias
 */
Route::get('/categories', 'Api\CategoryApiController@categoriesByTenant');
