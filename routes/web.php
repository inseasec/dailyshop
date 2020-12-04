<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
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

Auth::routes();
Route::get('home',function(){
	return redirect('admin');
});

//data
Route::get('data-table','frontend\HomeController@dataTablePage');
/*Route::any('students/list','frontend\HomeController@getStudents')->name('students.list');*/

Route::any('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('login', '\App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
Route::any('register','Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');


/* login $ logout routes for frontend Customers */
Route::any('customer-registeration-form','Auth\FrontendRegisterController@showRegistrationForm');
Route::any('customer-register','Auth\FrontendRegisterController@customerRegister');

Route::any('customer-login-form','Auth\FrontendLoginController@showLoginForm');
Route::any('customer-login','Auth\FrontendLoginController@customerLogin');
Route::any('customer-logout','Auth\FrontendLoginController@customerLogout');



Route::group(['prefix' => 'admin','middleware' => 'auth:web'], function(){

	Route::get('/', 'backend\HomeController@index')->name('home');
		Route::group(['prefix' => 'department'], function(){
			Route::get('/create','backend\DepartmentController@create');
			Route::get('/insert','backend\DepartmentController@insert');
			Route::get('/view', 'backend\DepartmentController@view');
			Route::get('/edit/{id}','backend\DepartmentController@show');
			Route::post('/edit/{id}','backend\DepartmentController@edit');
			Route::get('/delete/{id}','backend\DepartmentController@delete');

		});

		Route::group(['prefix' => 'category'], function(){
			Route::get('/create','backend\CategorieController@create');
			Route::post('/insert_data','backend\CategorieController@insert');
			Route::get('/view', 'backend\CategorieController@view');
			Route::get('/edit/{id}','backend\CategorieController@show');
			Route::any('/delete/{id}','backend\CategorieController@deleteById');
			Route::post('/update','backend\CategorieController@updateById');
		});

		Route::group(['prefix' => 'product'], function(){
			Route::get('/create','backend\ProductController@create');
			Route::post('/insert','backend\ProductController@insert');
			Route::get('/view', 'backend\ProductController@view');
			Route::get('/edit/{id}', 'backend\ProductController@edit');
			Route::any('/update', 'backend\ProductController@update');
			Route::any('/delete/{id}', 'backend\ProductController@deleteById');
			Route::post('/department-categories/{id}', 'backend\ProductController@getCategories');
			
		});
});


Route::get('/','frontend\HomeController@index');
/*Route::get('/home','FrontendController@index');*/
Route::get('/product/{id}','frontend\HomeController@showSingleProduct');
/*Route::get('/register','FrontendController@showRegistrationForm');*/
Route::get('show-cart','frontend\HomeController@showCart');
Route::get('/insert_data/{p_id}','frontend\HomeController@insertt');
Route::get('add-to-cart','frontend\HomeController@addToCart');
Route::get('show-wishlist','frontend\HomeController@showWishList');
Route::get('show-checkout','frontend\HomeController@showCheckout');
Route::any('single-category_products/{name}','frontend\HomeController@showSingleCategoryProducts');
Route::any('department/{name}','frontend\HomeController@showDepartmentPage');
Route::post('insert','frontend\HomeController@insert');
Route::any('product-cart/{id}','frontend\HomeController@addDataToCart');

