<?php
use Cores\Route;

Route::get('', 'HomeController@index');
Route::get('work/create', 'WorkController@create');
Route::post('work/store', 'WorkController@store');
Route::get('work/{id}', 'WorkController@edit');
Route::post('work/{id}/update', 'WorkController@update');
Route::post('work/{id}/delete', 'WorkController@delete');
