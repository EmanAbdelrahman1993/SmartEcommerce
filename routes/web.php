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

Route::get('/home', function ()
{
    return view('frontend.index');
});
Route::get('/index','frontend\UserController@index');

//Login with Github,Facebook,Google Account
Route::get('auth/{provider}', 'AuthSocController@redirectToProvider');
Route::get('auth/{provider}/callback', 'AuthSocController@handleProviderCallback');

Route::group(['middleware' => 'role:super-admin'], function() {

    Route::resource('category', 'Admin\CategoryController');
	Route::resource('product','Admin\ProductController');
    Route::resource('comment', 'Admin\CommentController');
    Route::get('comment/{id}/approve','Admin\CommentController@approve');
    Route::get('comment/{id}/close','Admin\CommentController@close');

    Route::resource('order', 'Admin\OrderController');



});

Route::resource('admin/permission', 'Admin\PermissionController');
Route::resource('admin/role', 'Admin\RoleController');
Route::resource('admin/user', 'Admin\UserController');
Route::get('/admin','Admin\AdminController@index');


Route::resource('products', 'frontend\ProductController');
Route::post('/order', 'OrderController@orderNow');
Route::get('/order_details', 'OrderController@orderDetails');
Route::get('/viewOrders', 'frontend\UserController@viewOrders');
Route::get('/cart', 'frontend\UserController@view_cart');
Route::post('/add_to_cart/{id}', 'frontend\UserController@add_to_cart');



