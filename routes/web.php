<?php

use Illuminate\Support\Facades\Route;


Route::group(['namespace'=>'App\Http\Controllers\Site','middleware'=>'guest:web'],function (){
    Route::get('login','LoginController@login')->name('login');
    Route::post('saveLogin','LoginController@saveLogin')->name('saveLogin');
    ////////////////
    Route::get('register','LoginController@register')->name('register');
    Route::post('saveUser','LoginController@saveUser')->name('saveUser');

});
//////////////////////////////////
Route::group(['namespace'=>'App\Http\Controllers\Site','middleware'=>'auth:web'],function (){
    Route::get('logout','LoginController@logout')->name('logout');

});



Route::group(['prefix'=> LaravelLocalization::setLocale(),'middleware'=> [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]],function (){

    Route::group(['namespace'=>'App\Http\Controllers\Site','middleware'=>'auth:web'],function (){
        Route::get('/','HomeController@home')->name('home');


        Route::get('about','HomeController@about')->name('about');
        Route::get('products','HomeController@products')->name('products');
        Route::get('search_product','HomeController@search_product')->name('search_product');
        Route::get('contact','HomeController@contact')->name('contact');

        ////////////////////////////////////////////////
        Route::post('subscribe','SiteController@subscribe')->name('subscribe');
        Route::post('feedback','SiteController@feedback')->name('feedback');
        Route::get('cash','SiteController@sendCart')->name('cash.order');




        ////////////////////////////////////////
        Route::get('add-cart/{id}','CartController@addCart')->name('add_to_cart');
        Route::get('cart','CartController@cart')->name('cart');
        Route::delete('removeCart','CartController@removeCart')->name('remove_cart');
        Route::get('updateCart','CartController@updateCart')->name('update_cart');



        ///////////////////////////////////
//        Route::get('pay','PaymobController@pay')->name('pay');
//        Route::get('state','PaymobController@state')->name('state');




    });

});









