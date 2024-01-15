<?php

use Illuminate\Support\Facades\Route;

define('PAGINATE',6);


/////////////////////         LOGIN            ///////////////////////////


Route::group(['namespace'=>'App\Http\Controllers\Admin','middleware'=>'guest:admin'],function (){
    Route::get('/login','LoginController@index')->name('admin.login');
    Route::post('/adminLogin','LoginController@login')->name('enter.admin');
//    Route::get('/logout','LoginController@logout')->name('logout.admin');

});
//////////////////           LOGOUT             /////////////////


Route::group(['middleware'=>['auth:admin']],function(){
    Route::get('/logout','App\Http\Controllers\Admin\LoginController@logout')->name('logout.admin');

});

////////////// ADMIN ///////////////////

Route::group(['namespace'=>'App\Http\Controllers\Admin','middleware'=>'auth:admin'],function (){
    Route::get('/','AdminController@index')->name('dashboard');

    //////////////////    ADDED  Admin //////////////

    Route::get('create_admin','AdminController@create_admin')->name('create_admin');
    Route::post('store_admin','AdminController@store_admin')->name('store_admin');

    Route::get('show_admin','AdminController@show_admin')->name('show_admin');

    Route::get('edit_admin/{id}','AdminController@edit_admin')->name('edit_admin');
    Route::post('update_admin/{id}','AdminController@update_admin')->name('update_admin');
    Route::get('delete_admin/{id}','AdminController@delete_admin')->name('delete_admin');



    //////////////////    ADDED  User //////////////

    Route::get('create_user','AdminController@create_user')->name('create_user');
    Route::post('store_user','AdminController@store_user')->name('store_user');

    Route::get('show_user','AdminController@show_user')->name('show_user');


    Route::get('edit_user/{id}','AdminController@edit_user')->name('edit_user');
    Route::post('update_user/{id}','AdminController@update_user')->name('update_user');
    Route::get('delete_user/{id}','AdminController@delete_user')->name('delete_user');



    ///////////////  MainCategory /////////////////

    Route::get('create_category','CategoriesController@create_category')->name('create.category');
    Route::post('store_category','CategoriesController@store_category')->name('store.category');

    Route::get('show_category','CategoriesController@show_category')->name('show.category');

    Route::get('edit_category/{id}','CategoriesController@edit_category')->name('edit.category');
    Route::post('update_category/{id}','CategoriesController@update_category')->name('update.category');
    Route::get('delete_category/{id}','CategoriesController@delete_category')->name('delete.category');



    /////////////////  SUBCATEGORIES //////////////////

//   Route::post('search','SubCategoriesController@search')->name('search');

    Route::get('create_subCategory','SubCategoriesController@create_subCategory')->name('create.subCategory');
    Route::post('store_subCategory','SubCategoriesController@store_subCategory')->name('store.subCategory');

    Route::get('show_subCategory','SubCategoriesController@show_subCategory')->name('show.subCategory');

    Route::get('edit_subCategory/{id}','SubCategoriesController@edit_subCategory')->name('edit.subCategory');
    Route::post('update_subCategory/{id}','SubCategoriesController@update_subCategory')->name('update.subCategory');

    Route::get('delete_subCategory/{id}','SubCategoriesController@delete_subCategory')->name('delete.subCategory');

    Route::get('changeStatus_subCategory/{id}','SubCategoriesController@changeStatus_subCategory')->name('changeStatus.subCategory');


    Route::get('search','SubCategoriesController@search')->name('search');
    ///////////////////////  orders //////////////////
    Route::get('showOrder','OrdersController@showOrder')->name('show.order');
    Route::get('deleteOrder/{id}','OrdersController@deleteOrder')->name('delete.order');
    Route::get('updateOrder/{id}','OrdersController@updateOrder')->name('update.order');


    ///////////////////////   feedback  /////////

    Route::get('showFeedback','OrdersController@showFeedback')->name('show.feedback');
    Route::get('showSubscribe','OrdersController@showSubscribe')->name('show.subscribe');




});


