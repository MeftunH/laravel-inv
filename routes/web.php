<?php

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
    return view('index');
});

Auth::routes();
Route::get('/home', 'ProductController@index')->name('home');
Route::get('/customer/create/{id?}','CustomerController@create')->name('create.customer');
Route::post('/customer/store','CustomerController@store')->name('customer.store');
Route::post('/employes/store','EmployesController@store')->name('employes.store');
Route::get('products','ProductController@index')->name('product.index');
Route::get('expenses','ExpensesController@index')->name('expenses.index');
Route::get('/customer/index','CustomerController@index')->name('customer.index');
Route::get('/employes/index','EmployesController@index')->name('employes.index');
Route::get('/create/{id?}','ProductController@create')->name('create.product');
Route::get('/emp/create/{id?}','EmployesController@create')->name('create.employes');
Route::get('delete/expenses/{id}','ExpensesController@delete');
Route::get('/createexp/{id?}','ExpensesController@create')->name('create.expenses');
Route::get('/search','ExpensesController@search');
Route::post('expstore','ExpensesController@store')->name('expenses.store');
Route::post('store','ProductController@store')->name('product.store');
Route::get('edit/product/{id}','ProductController@Edit');
Route::get('editemp/{id}','EmployesController@Edit')->name('employes.edit');
Route::get('editexp/{id}','ExpensesController@Edit');
Route::post('update/expenses/{id}','ExpensesController@update');
Route::post('update/employes/{id}','EmployesController@update')->name('employes.update');
Route::get('delete/product/{id}','ProductController@delete');
Route::get('show/product/{id}','ProductController@Show');
Route::post('update/product/{id}','ProductController@update');
Route::get('edit/customer/{id}','CustomerController@Edit');
Route::post('update/{id}','CustomerController@update');
Route::get('delete/customer/{id}','CustomerController@delete');
Route::get('show/product/{id}','CustomerController@Show');
Route::get("/customer","CustomerController@view");
Route::get('/edit-product/{product}','ProductController@edit');
Route::put('/edit-product/{product}','ProductController@update');
Route::get('/customerproduct/{id?}',"CustomerProduct@index")->name('customerproduct');


