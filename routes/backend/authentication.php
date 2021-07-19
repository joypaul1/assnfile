<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/admin/login', 'Auth\BackendLoginController@showLoginForm')->name('backend.login.form');
Route::post('/admin/login', 'Auth\BackendLoginController@login')->name('backend.login.confirm');
Route::post('/admin/logout', 'Auth\BackendLoginController@logout')->name('backend.logout');

Auth::routes();
