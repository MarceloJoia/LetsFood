<?php

use Illuminate\Support\Facades\Route;


Route::prefix('admin')->namespace('Admin')->group(function(){

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
     * Plans Routes
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



Route::get('/', function () {
    return view('welcome');
});
