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


//category Routes
Route::group(['middleware' => 'web'], function () {
  Route::resource('category', '\App\Http\Controllers\CategoryController');
  Route::post('category/{id}/update', '\App\Http\Controllers\CategoryController@update');
  Route::get('category/{id}/delete', '\App\Http\Controllers\CategoryController@destroy');
  Route::get('category/{id}/deleteMsg', '\App\Http\Controllers\CategoryController@DeleteMsg');
});

//subcategory Routes
Route::group(['middleware' => 'web'], function () {
  Route::resource('subcategory', '\App\Http\Controllers\SubcategoryController');
  Route::post('subcategory/{id}/update', '\App\Http\Controllers\SubcategoryController@update');
  Route::get('subcategory/{id}/delete', '\App\Http\Controllers\SubcategoryController@destroy');
  Route::get('subcategory/{id}/deleteMsg', '\App\Http\Controllers\SubcategoryController@DeleteMsg');
});

//project Routes
Route::group(['middleware' => 'web'], function () {
  Route::resource('project', '\App\Http\Controllers\ProjectController');
  Route::post('project/{id}/update', '\App\Http\Controllers\ProjectController@update');
  Route::get('project/{id}/delete', '\App\Http\Controllers\ProjectController@destroy');
  Route::get('project/{id}/deleteMsg', '\App\Http\Controllers\ProjectController@DeleteMsg');
  Route::get('project/{id}/activateMsg', '\App\Http\Controllers\ProjectController@ActivateMsg');
  Route::get('project/{id}/blockMsg', '\App\Http\Controllers\ProjectController@BlockMsg');
  Route::get('project/{id}/block', '\App\Http\Controllers\ProjectController@block');
  Route::get('project/{id}/activate', '\App\Http\Controllers\ProjectController@activate');

});

/*//reward Routes
Route::group(['middleware' => 'web'], function () {
  Route::get('reward/projects/{view}', '\App\Http\Controllers\CommonController@get_projects');
  Route::get('reward/{pid}/get-rewards/', '\App\Http\Controllers\RewardController@get_rewards');

  Route::resource('reward', '\App\Http\Controllers\RewardController');
  Route::get('reward/{id}/create', '\App\Http\Controllers\RewardController@create');
  Route::post('reward/{id}/update', '\App\Http\Controllers\RewardController@update');
  Route::get('reward/{id}/delete', '\App\Http\Controllers\RewardController@destroy');
  Route::get('reward/{id}/deleteMsg', '\App\Http\Controllers\RewardController@DeleteMsg');
});*/


/*//update Routes
Route::group(['middleware' => 'web'], function () {
  Route::get('update/projects/{view}', '\App\Http\Controllers\CommonController@get_projects');
  Route::get('update/{pid}/get-updates/', '\App\Http\Controllers\UpdateController@get_updates');

  Route::resource('update', '\App\Http\Controllers\UpdateController');
  Route::get('update/{id}/create', '\App\Http\Controllers\UpdateController@create');
  Route::post('update/{id}/update', '\App\Http\Controllers\UpdateController@update');
  Route::get('update/{id}/delete', '\App\Http\Controllers\UpdateController@destroy');
  Route::get('update/{id}/deleteMsg', '\App\Http\Controllers\UpdateController@DeleteMsg');
});*/

//user Routes
Route::group(['middleware' => 'web'], function () {
  Route::resource('user', '\App\Http\Controllers\UserController');
  //Route::post('user/{id}/update', '\App\Http\Controllers\UserController@update');
  Route::get('user/{id}/delete', '\App\Http\Controllers\UserController@destroy');
  Route::get('user/{id}/deleteMsg', '\App\Http\Controllers\UserController@DeleteMsg');
  Route::get('user/{id}/blockMsg', '\App\Http\Controllers\UserController@BlockMsg');
  Route::get('user/{id}/activateMsg', '\App\Http\Controllers\UserController@ActivateMsg');
  Route::get('user/{id}/block', '\App\Http\Controllers\UserController@block');
  Route::get('user/{id}/activate', '\App\Http\Controllers\UserController@activate');
});


//Revision Routes
Route::group(['middleware' => 'web'], function () {
  Route::resource('revision', '\App\Http\Controllers\RevisionController');
  Route::get('revision/{id}/approve', '\App\Http\Controllers\RevisionController@approveRevision');
  Route::post('revision/approve-project', '\App\Http\Controllers\RevisionController@confirmApproval');
  
});




Route::get('/', function () {
  return view('welcome');
});
Route::get('home', 'DashboardController@index')->name('home');
Route::post('login', '\App\Http\Controllers\LoginController@do_login');
Route::get('logout', '\App\Http\Controllers\LoginController@logout');
Route::post('secure/get_avil_subcategories', '\App\Http\Controllers\CategoryController@get_subcategories');
