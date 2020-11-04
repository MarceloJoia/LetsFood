<?php

use Illuminate\Support\Facades\Route;

/*
use App\Models\Client;
Route::get('teste', function () {
    $client = Client::first();
    $token = $client->createToken('token-teste');
    dd($token->plainTextToken);
});
*/

Route::prefix('admin')
            ->namespace('Admin')
            ->middleware('auth')
            ->group(function() {
    /**
     * Role X User
     */
    Route::get('users/{id}/role/{idRole}/detach', 'ACL\RoleUserController@detachRoleUser')->name('users.role.detach');
    Route::post('users/{id}/roles/store', 'ACL\RoleUserController@attachRolesRole')->name('users.roles.attach');
    Route::any('users/{id}/roles/create', 'ACL\RoleUserController@rolesAvailable')->name('users.roles.available');
    Route::get('users/{id}/roles', 'ACL\RoleUserController@roles')->name('users.roles');
    Route::get('roles/{id}/users', 'ACL\RoleUserController@users')->name('roles.users');
    /**
     * Permission Role
     */
    Route::get('roles/{id}/permission/{idPermission}/detach', 'ACL\PermissionRoleController@detachPermissionRole')->name('roles.permission.detach');
    Route::post('roles/{id}/permissions/store', 'ACL\PermissionRoleController@attachPermissionRole')->name('roles.permissions.attach');
    Route::any('roles/{id}/permissions/create', 'ACL\PermissionRoleController@permissionsAvailable')->name('roles.permissions.available');
    Route::get('roles/{id}/permissions', 'ACL\PermissionRoleController@permissions')->name('roles.permissions');
    Route::get('permissions/{id}/role', 'ACL\PermissionRoleController@roles')->name('permissions.roles');
    /**
     * Routes Papeis
     */
    Route::any('roles/search', 'ACL\RoleController@search')->name('roles.search');
    Route::resource('roles', 'ACL\RoleController');
    /**
     * Routes Tenants
     */
    Route::any('tenants/search', 'TenantController@search')->name('tenants.search');
    Route::resource('tenants', 'TenantController');
    /**
     * Routes Tables
     */
    Route::any('tables/search', 'TableController@search')->name('tables.search');
    Route::resource('tables', 'TableController');
    /**
     * Product X Category
     */
    Route::get('products/{id}/category/{idCategory}/detach', 'CategoryProductController@detachCategoryProduct')->name('products.category.detach');
    Route::post('products/{id}/categories/store', 'CategoryProductController@attachCategoriesProduct')->name('products.categories.attach');
    Route::any('products/{id}/categories/create', 'CategoryProductController@categoriesAvailable')->name('products.categories.available');
    Route::get('products/{id}/categories', 'CategoryProductController@categories')->name('products.categories');
    Route::get('categories/{id}/products', 'CategoryProductController@products')->name('categories.products');
    /**
     * Routes Produtos
     */
    Route::any('products/search', 'ProductController@search')->name('products.search');
    Route::resource('products', 'ProductController');
    /**
     * Routes Categories
     */
    Route::any('categories/search', 'CategoryController@search')->name('categories.search');
    Route::resource('categories', 'CategoryController');
    /**
     * Routes Users
     */
    Route::any('users/search', 'UserController@search')->name('users.search');
    Route::resource('users', 'UserController');
    /**
     * Plans X Profiles
     */
    Route::get('plans/{id}/profiles/{idProfile}/detach', 'ACL\PlanProfileController@detachPlanProfile')->name('plans.profiles.detach');
    Route::post('plans/{id}/profiles/store', 'ACL\PlanProfileController@attachPlanProfile')->name('plans.profiles.attach');
    Route::any('plans/{id}/profiles/create', 'ACL\PlanProfileController@profilesAvailable')->name('plans.profiles.available');
    Route::get('plans/{id}/profiles', 'ACL\PlanProfileController@profiles')->name('plans.profiles');
    //plans profile
    Route::get('profiles/{id}/plans', 'ACL\PlanProfileController@plans')->name('profiles.plans');
    /**
     * Permission Profiles
     */
    Route::get('profiles/{id}/permission/{idPermission}/detach', 'ACL\PermissionProfileController@detachPermissionProfile')->name('profiles.permission.detach');
    Route::post('profiles/{id}/permissions/store', 'ACL\PermissionProfileController@attachPermissionProfile')->name('profiles.permissions.attach');
    Route::any('profiles/{id}/permissions/create', 'ACL\PermissionProfileController@permissionsAvailable')->name('profiles.permissions.available');
    Route::get('profiles/{id}/permissions', 'ACL\PermissionProfileController@permissions')->name('profiles.permissions');
    //Profiles Permission
    Route::get('permissions/{id}/profiles', 'ACL\PermissionProfileController@profiles')->name('permissions.profiles');
    /**
     * Routes Permission
     */
    Route::any('permissions/search', 'ACL\PermissionController@search')->name('permissions.search');
    Route::delete('permissions/{id}/destroy', 'ACL\PermissionController@destroy')->name('permissions.destroy');
    Route::put('permissions/{id}/update', 'ACL\PermissionController@update')->name('permissions.update');
    Route::get('permissions/{id}/edit', 'ACL\PermissionController@edit')->name('permissions.edit');
    Route::get('permissions/{id}/show', 'ACL\PermissionController@show')->name('permissions.show');
    route::post('permissions/store','ACL\PermissionController@store')->name('permissions.store');
    route::get('permissions/create','ACL\PermissionController@create')->name('permissions.create');
    route::get('permissions','ACL\PermissionController@index')->name('permissions.index');
    /**
     * Routes Profiles
     */
    Route::any('profiles/search', 'ACL\ProfileController@search')->name('profiles.search');
    Route::resource('profiles', 'ACL\ProfileController');
    /**
     * Plans Details Routes
     */
    Route::delete('plans/{url}/details/{idDetail}/destroy', 'DetailPlanController@destroy')->name('plans.details.destroy');
    Route::put('plans/{url}/details/{idDetail}/update', 'DetailPlanController@update')->name('plans.details.update');
    Route::get('plans/{url}/details/{idDetail}/edit', 'DetailPlanController@edit')->name('plans.details.edit');
    Route::get('plans/{url}/details/{idDetail}/show', 'DetailPlanController@show')->name('plans.details.show');
    Route::post('plans/{url}/details/store', 'DetailPlanController@store')->name('plans.details.store');
    Route::get('plans/{url}/details/create', 'DetailPlanController@create')->name('plans.details.create');
    Route::get('plans/{url}/details/index', 'DetailPlanController@index')->name('plans.details.index');
    /**
     * Plans Routes
     */
    Route::any('plans/search', 'PlanController@search')->name('plans.search');
    Route::delete('plans/{url}/destroy', 'PlanController@destroy')->name('plans.destroy');
    Route::put('plans/{url}/update', 'PlanController@update')->name('plans.update');
    Route::get('plans/{url}/edit', 'PlanController@edit')->name('plans.edit');
    Route::get('plans/{url}/show', 'PlanController@show')->name('plans.show');
    route::post('plans/store','PlanController@store')->name('plans.store');
    route::get('plans/create','PlanController@create')->name('plans.create');
    route::get('plans','PlanController@index')->name('plans.index');
    /**
     * BreadCrumb
     */
    route::get('/','PlanController@index')->name('admin.index');
});


/**
 * Site
 */
Route::namespace('Site')
    ->group(function () {

        Route::get('/plan/{url}', 'SiteController@plan')->name('plan.subscription');
        Route::get('/', 'SiteController@index')->name('site.home');
});


/**
 * Auth Routes
 */
Auth::routes();

/**
 * Abilita registro manual
 */
//Auth::routes(['register'=> false ]);
