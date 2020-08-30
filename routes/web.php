<?php

use Illuminate\Support\Facades\Route;

Route::any('admin/plans/search', 'Admin\PlanController@search')->name('plans.search');

Route::delete('admin/plans/{url}/destroy', 'Admin\PlanController@destroy')->name('plans.destroy');
Route::put('admin/plans/{url}/update', 'Admin\PlanController@update')->name('plans.update');
Route::get('admin/plans/{url}/edit', 'Admin\PlanController@edit')->name('plans.edit');
Route::get('admin/plans/{url}/show', 'Admin\PlanController@show')->name('plans.show');
route::post('admin/plans/store','Admin\PlanController@store')->name('plans.store');
route::get('admin/plans/create','Admin\PlanController@create')->name('plans.create');
route::get('admin/plans','Admin\PlanController@index')->name('plans.index');

/**
 * BreadCrumb
 */
route::get('admin','Admin\PlanController@index')->name('admin.index');


Route::get('/', function () {
    return view('welcome');
});
