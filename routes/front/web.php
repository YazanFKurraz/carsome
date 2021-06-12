<?php

use Illuminate\Support\Facades\Route;

//logout


Route::get('/logout', 'Auth\LoginController@logout')->name('log-out');
// front view

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');


Route::group(['namespace' => 'FrontController'], function () {
    Route::group(['prefix' => 'cars'], function () {
        Route::get('/', 'CarController@index')->name('cars.index');
        Route::get('/details/{car}', 'CarController@show')->name('cars.show');
        Route::get('/sell-car', 'SellController@create')->name('sell.create');
        Route::get('myform', 'SellController@myform');
        Route::post('myform/ajax', 'SellController@myformAjax')->name('model.ajax');
        Route::post('store', 'SellController@store')->name('cars.store');


    });
});

Route::group(['namespace' => 'FrontController'], function () {

    Route::get('about_us', 'ContactController@about_us')->name('about_us');
    Route::get('contact_us', 'ContactController@contact_us')->name('contact_us');
    Route::post('/contact_us-submit', 'ContactUsController@store')->name('contact_us.store');

    Route::group(['prefix' => 'user'], function () {

        Route::get('/profile', 'ProfileController@show')->name('profile.show');
        Route::post('/profile/reset-password', 'ProfileController@reset_password')->name('profile.reset_password');

    });
});

