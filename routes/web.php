<?php

use Illuminate\Support\Facades\Route;

//saidi is here

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::group(['prefix' => 'dashboard', 'middleware' => ['role:superadministrator|dealer']], function () {

    Route::get('/', 'AdminController@index')->name('dashboard');
    Route::group(['prefix' => 'mange'], function () {
        Route::group(['prefix' => 'user'], function () {
            Route::get('/', 'AdminController@indexUser')->name('admin.users');
            Route::get('create', 'AdminController@createUser')->name('admin.user.create');
            Route::post('store', 'AdminController@storeUser')->name('admin.user.store');
            Route::get('show/{id}', 'AdminController@showUser')->name('admin.user.show');
            Route::get('edit/{id}', 'AdminController@editUser')->name('admin.user.edit');
            Route::post('update/{id}', 'AdminController@updateUser')->name('admin.user.update');
            Route::get('delete/{id}', 'AdminController@destroyUser')->name('admin.user.delete');

        });

        Route::group(['prefix' => 'permission'], function () {
            Route::get('/', 'AdminController@indexPermission')->name('admin.permissions');
            Route::get('create', 'AdminController@createPermission')->name('admin.permission.create');
            Route::post('store', 'AdminController@storePermission')->name('admin.permission.store');
            Route::get('show/{id}', 'AdminController@showPermission')->name('admin.permission.show');
            Route::get('edit/{id}', 'AdminController@editPermission')->name('admin.permission.edit');
            Route::post('update/{id}', 'AdminController@updatePermission')->name('admin.permission.update');
            Route::get('delete/{id}', 'AdminController@destroyPermission')->name('admin.permission.delete');
        });

        Route::group(['prefix' => 'role'], function () {
            Route::get('/', 'AdminController@indexRole')->name('admin.roles');
            Route::get('create', 'AdminController@createRole')->name('admin.role.create');
            Route::post('store', 'AdminController@storeRole')->name('admin.role.store');
            Route::get('show/{id}', 'AdminController@showRole')->name('admin.role.show');
            Route::get('edit/{id}', 'AdminController@editRole')->name('admin.role.edit');
            Route::put('update/{id}', 'AdminController@updateRole')->name('admin.role.update');
            Route::get('delete/{id}', 'AdminController@destroyRole')->name('admin.role.delete');
        });
    });


    /************** Route Brand Car **************/
    Route::group(['prefix' => 'brand'], function () {
        Route::get('/', 'brandController@index')->name('admin.brands');
        Route::get('/create', 'brandController@create')->name('admin.brand.create');
        Route::post('/store', 'brandController@store')->name('admin.brand.store');
        Route::get('edit/{id}', 'brandController@edit')->name('admin.brand.edit');
        Route::post('update/{id}', 'brandController@update')->name('admin.brand.update');
        Route::get('delete/{id}', 'brandController@destroy')->name('admin.brand.delete');
    });
    /************** End Route Brand Car **************/

    /************** Route Car Model **************/
    Route::group(['prefix' => 'model'], function () {
        Route::get('/', 'modelController@index')->name('admin.models');
        Route::get('create', 'modelController@create')->name('admin.model.create');
        Route::post('store', 'modelController@store')->name('admin.model.store');
        Route::get('edit/{id}', 'modelController@edit')->name('admin.model.edit');
        Route::post('update/{id}', 'modelController@update')->name('admin.model.update');
        Route::get('delete/{id}', 'modelController@destroy')->name('admin.model.delete');
    });
    /************** End Route Car Model **************/

    /************** Route Car **************/
    Route::group(['prefix' => 'car'], function () {

        Route::get('/', 'carController@index')->name('admin.cars');
        Route::get('create', 'carController@create')->name('admin.car.create');

        Route::get('myform', 'carController@myform');
        Route::post('myform/ajax', 'carController@myformAjax')->name('admin.car.model.ajax');
        Route::post('store', 'carController@store')->name('admin.car.store');
        Route::get('edit/{id}', 'carController@edit')->name('admin.car.edit');
        Route::post('update/{id}', 'carController@update')->name('admin.car.update');
        Route::get('delete/{id}', 'carController@destroy')->name('admin.car.delete');

        Route::get('create/details/{id}', 'carController@createDetails')->name('admin.car.create.details');
        Route::post('store/details', 'carController@storeDetails')->name('admin.car.store.details');
        Route::get('show/details/{id}', 'carController@showDetails')->name('admin.car.show.details');

        Route::get('dropzone/{id}', 'carController@showDropzone')->name('admin.car.dropzone');
        Route::post('dropzone/upload/{car}', 'carController@upload')->name('admin.car.dropzone.upload');
        Route::delete('delete/{image}', 'carController@deleteImage')->name('admin.car.dropzone.delete');

    });

    /************** End Route Car **************/


});
Route::group(['prefix' => 'home', 'middleware' => ['role:superadministrator|user|dealer|checkup|administrator']], function () {
    Route::get('/', 'HomeController@index')->name('home');

});



Route::get('/home', 'HomeController@index')->name('home');
