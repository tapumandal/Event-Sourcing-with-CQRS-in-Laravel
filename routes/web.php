<?php


// use App\Http\Controllers\Admin\LoginController;
// use App\Http\Controllers\Admin\RegisterController;
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


// UserAccount
Route::group(['middleware' => ['auth']], function(){
	Route::get('/type', 'UserManagement@redirect');

	//Account Holder Account
	Route::get('/view', 'Accounts@show');
	Route::post('/deposite', 'Accounts@deposite');
	Route::get('/deposite', 'Accounts@deposite');

	Route::get('/transfer', 'Accounts@transfer');
	Route::post('/	transfer', 'Accounts@transfer');



	//Manager Route
	// Route::get('manager', function () {
 //    	return view('manager.panel');
	// });
	Route::get('/manager', 'Manager@manage');
	
	Route::get('/accountslist', 'Manager@accountsList');
	Route::post('/accountslist', 'Manager@accountsList');
	
	Route::get('/history', 'Manager@history');
	Route::post('/history', 'Manager@history');

	
	Route::get('/delete', 'Manager@delete');
	Route::post('/delete', 'Manager@delete');

	Route::get('/stoptransection', 'Manager@stopTransection');
	Route::post('/stoptransection', 'Manager@stopTransection');



});

Route::get('admin/login', 'AdminAuth\LoginController@showLoginForm');
Route::post('admin/login', 'AdminAuth\LoginController@login');

Route::get('admin/register', 'AdminAuth\RegisterController@showRegistrationForm');
Route::post('admin/register', 'AdminAuth\RegisterController@register');

Route::get('admin/logout', 'AdminAuth\LoginController@logout');

