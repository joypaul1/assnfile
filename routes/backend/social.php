<?php

use Illuminate\Support\Facades\Route;

// Route::group(['prefix' => '/social'], function () {
    Route::get('/social-media', 'SocialController@index')->name('backend.social.index');

    Route::post('/social/store', 'SocialController@store')->name('backend.social.store');
// });
// Route::get('/joy', function(){
//     dd(231111114);
// });
// Route::get('/akash-media', function(){
//     dd(234);
// });