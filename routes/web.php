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
Route::get('/customer/create/{id?}','CustomerController@create')->name('create.customer')->middleware('role:admin');
Route::post('/customer/store','CustomerController@store')->name('customer.store')->middleware('role:admin');
Route::post('/salaries/store','SalariesController@store')->name('salaries.store')->middleware('role:admin');
Route::post('/employes/store','EmployesController@store')->name('employes.store')->middleware('role:admin');
Route::get('products','ProductController@index')->name('product.index')->middleware('role:admin|manager');
Route::get('salaries','SalariesController@index')->name('salaries.index')->middleware('role:admin|manager');
Route::get('expenses','ExpensesController@index')->name('expenses.index')->middleware('role:admin|manager');
Route::get('balance','BalanceController@index')->name('balance.index')->middleware('role:admin|manager');
Route::get('/customer/index','CustomerController@index')->name('customer.index')->middleware('role:admin|manager');
Route::get('/employes/index','EmployesController@index')->name('employes.index')->middleware('role:admin|manager');
Route::get('/create/{id?}','ProductController@create')->name('create.product')->middleware('role:admin');
Route::get('/emp/create/{id?}','EmployesController@create')->name('create.employes')->middleware('role:admin');
Route::get('/sal/create/{id?}','SalariesController@create')->name('create.salaries')->middleware('role:admin');
Route::get('delete/expenses/{id}','ExpensesController@delete')->middleware('role:admin');
Route::get('/createexp/{id?}','ExpensesController@create')->name('create.expenses')->middleware('role:admin');
Route::get('/search','ExpensesController@search')->middleware('role:admin|manager');
Route::get('/searchempsal','EmployesSalary@searchempsal')->middleware('role:admin|manager');
Route::post('expstore','ExpensesController@store')->name('expenses.store')->middleware('role:admin');
Route::post('store','ProductController@store')->name('product.store')->middleware('role:admin');
Route::get('edit/product/{id}','ProductController@Edit')->middleware('role:admin');
Route::get('editemp/{id}','EmployesController@Edit')->name('employes.edit')->middleware('role:admin');
Route::get('editexp/{id}','ExpensesController@Edit')->middleware('role:admin');
Route::get('edit/salaries/{id}','SalariesController@Edit')->middleware('role:admin');
Route::post('update/expenses/{id}','ExpensesController@update')->middleware('role:admin');
Route::post('/update/salaries/{id}','SalariesController@update')->middleware('role:admin');
Route::post('update/employes/{id}','EmployesController@update')->name('employes.update')->middleware('role:admin');
Route::get('delete/product/{id}','ProductController@delete')->middleware('role:admin');
Route::get('show/product/{id}','ProductController@Show')->middleware('role:admin|manager');
Route::post('update/product/{id}','ProductController@update')->middleware('role:admin');
Route::get('edit/customer/{id}','CustomerController@Edit')->middleware('role:admin');
Route::post('update/{id}','CustomerController@update')->middleware('role:admin');
Route::get('delete/customer/{id}','CustomerController@delete')->middleware('role:admin');
Route::get('delete/employes/{id}','EmployesController@delete')->middleware('role:admin');
Route::get('del/salaries/{id}','SalariesController@delete')->middleware('role:admin');
Route::get('show/product/{id}','CustomerController@Show')->middleware('role:admin|manager');
Route::get("/customer","CustomerController@view")->middleware('role:admin|manager');
Route::get('/edit-product/{product}','ProductController@edit')->middleware('role:admin');
Route::put('/edit-product/{product}','ProductController@update')->middleware('role:admin');
Route::get('/customerproduct/{id?}',"CustomerProduct@index")->name('customerproduct')->middleware('role:admin|manager');
Route::get('/employessalaries/{id?}',"EmployesSalary@index")->name('employessalaries')->middleware('role:admin|manager');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
