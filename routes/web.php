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
    return view('welcome');
});



Auth::routes();

Route::group(['middleware' =>['auth','admin']],function(){
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });
    Route::get('/register-role','Admin\DashboardController@registerUser');
    Route::get('/edit-role/{id}','Admin\DashboardController@registerEdit');
    Route::put('/role-update/{id}','Admin\DashboardController@registerUpdate');
    Route::delete('/role-delete/{id}','Admin\DashboardController@registerDelete');

    Route::get('/about-us','Admin\AboutusController@index');
    Route::post('/save-about-us','Admin\AboutusController@store');
    Route::get('/about-us/{id}','Admin\AboutusController@edit');
    Route::put('/aboutus-update/{id}','Admin\AboutusController@update');
    Route::delete('/aboutus-delete/{id}','Admin\AboutusController@delete');

    Route::get('/service-category','Admin\ServiceController@index');
    Route::get('/create-services','Admin\ServiceController@create');
    Route::post('/service-add','Admin\ServiceController@store');
    Route::get('/service-cat-edit/{id}','Admin\ServiceController@edit');
    Route::put('/service-update/{id}','Admin\ServiceController@update');
    Route::delete('/service-cat-delete/{id}','Admin\ServiceController@delete');

    Route::get('/service-list','Admin\ServiceListController@index');
    Route::post('/service-list-add','Admin\ServiceListController@store');
    Route::get('/service-list-edit/{id}','Admin\ServiceListController@edit');
    Route::put('/service-list-update/{id}','Admin\ServiceListController@update');

});

Route::get('/home', 'HomeController@index')->name('home');
