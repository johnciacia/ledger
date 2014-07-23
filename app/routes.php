<?php

Route::get('/', 'HomeController@home');

Route::get('login', 'UserController@login');
Route::post('login', array(
  'before' => 'csrf',
  'uses' => 'UserController@auth',
));


Route::get('dashboard', array(
  'before' => 'auth',
  'uses' => 'HomeController@dashboard',
));

Route::get('register', 'UserController@register');
Route::post('register', array(
  'before' => 'csrf',
  'uses' => 'UserController@create',
));





Route::get('logout', 'UserController@logout');
