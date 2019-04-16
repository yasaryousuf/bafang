<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/test', 'HomeController@test');

Route::resource('news', 'NewsController');



Route::get('service', 'ServiceController@index');
Route::get('service/{slug}', 'ServiceController@show');
Route::put('service/{id}', 'ServiceController@update')->name('service.update');
Route::post('service', 'ServiceController@store');
Route::delete('service/{id}', 'ServiceController@destroy')->name('service.destroy');


Route::get('company', 'CompanyController@index');
Route::get('company/{slug}', 'CompanyController@show');
Route::put('company/{id}', 'CompanyController@update')->name('company.update');
Route::post('company', 'CompanyController@store');
Route::delete('company/{id}', 'CompanyController@destroy')->name('company.destroy');


Route::post('contact', 'ContactController@store');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/home', 'AdminController@index');


    Route::get('admin/news', 'NewsController@adminIndex');
    Route::get('admin/news/create', 'NewsController@create');
    Route::get('admin/news/{id}/edit', 'NewsController@edit');

    Route::get('admin/service', 'ServiceController@adminIndex');
    Route::get('admin/service/create', 'ServiceController@create');
    Route::get('admin/service/{id}/edit', 'ServiceController@edit');

    Route::get('admin/company', 'CompanyController@adminIndex');
    Route::get('admin/company/create', 'CompanyController@create');
    Route::get('admin/company/{id}/edit', 'CompanyController@edit');

    Route::get('admin/contact', 'ContactController@adminIndex');

});