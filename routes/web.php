<?php

// One to One
Route::get('one-to-one', 'oneToOneController@oneToOne');
Route::get('one-to-one-inverse', 'oneToOneController@oneToOneInverse');
Route::get('one-to-one-insert', 'oneToOneController@oneToOneInsert');

// One to Many
Route::get('one-to-many', 'OneToManyController@oneToMany');

Route::get('/', function () {
    return view('welcome');
});
