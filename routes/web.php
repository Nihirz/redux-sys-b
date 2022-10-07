<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return redirect()->route('login');
});
// Admin Panel Start
Route::group(['middleware'=>'auth'], function () {
    // Admin category Srart
    Route::get('/admin/category', 'AdminCategoryController@index')->name('admin.category');
    Route::get('/admin/category/create', 'AdminCategoryController@create')->name('admin.category.create');
    Route::get('/admin/add-category', 'AdminCategoryController@add')->name('AddAdmin.category');
    Route::post('/admin/store-category', 'AdminCategoryController@store')->name('store.category');
    Route::get('/admin-edit/{id}', 'AdminCategoryController@edit')->name('edit.category');
    Route::post('/category', 'AdminCategoryController@update')->name('update.category');
    Route::get('/delete/{id}', 'AdminCategoryController@delete')->name('delete.category');
    // Admin category End

    Route::get('/admin-clients', 'AdminClientController@index')->name('admin.client');
    Route::get('/admin/add-new-client', 'AdminClientController@addnew')->name('admin.new.client');
    Route::post('/admin-store', 'AdminClientController@store')->name('store.client');
    Route::get('/edit-client/{id}', 'AdminClientController@edit')->name('edit.client');
    Route::post('/update/client', 'AdminClientController@update')->name('update.client');
    Route::get('/delete/client/{id}', 'AdminClientController@delete')->name('delete.client');

    Route::get('/admin/detail-client/{id}', 'ClientProductController@index')->name('detail.client');
    Route::post('/store/client-products', 'ClientProductController@store')->name('store.product');
    Route::get('/edit-client-product/{id}', 'ClientProductController@edit_products')->name('edit.product');
    Route::post('/update-products', 'ClientProductController@update')->name('update.product');
    Route::get('/admin/delete-product/{id}', 'ClientProductController@delete')->name('delete.products');



    Route::get('/view-product-detail/{id}', 'ClientProductController@downloadPdf')->name('view.clientdetails');
    Route::get('/download-pdf/{id}', 'ClientProductController@pdf')->name('download.pdf');
    Route::get('/view-product-sendmail/{id}', 'ClientProductController@mailPdf')->name('send.clientdetails');
    Route::get('/view-pdf/{id}', 'ClientProductController@viewpdf')->name('view.pdf');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
