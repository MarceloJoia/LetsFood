<?php

/**
 * Endpoint tenants
 */
Route::get('/tenants/{uuid}', 'Api\TenantApiController@show');
Route::get('/tenants', 'Api\TenantApiController@index');

/**
 * Endpoint Categorias
 */
Route::get('/categories/{url}', 'Api\CategoryApiController@show');
Route::get('/categories', 'Api\CategoryApiController@categoriesByTenant');

/**
 * Endpoint Tables
 */
Route::get('/tables/{url}', 'Api\TableApiController@show');
Route::get('/tables', 'Api\TableApiController@tablesByTenant');
