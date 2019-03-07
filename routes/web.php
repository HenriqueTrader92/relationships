<?php

// One to One
Route::get('one-to-one', 'oneToOneController@oneToOne');
Route::get('one-to-one-inverse', 'oneToOneController@oneToOneInverse');
Route::get('one-to-one-insert', 'oneToOneController@oneToOneInsert');

Route::get('/', function () {
    return view('welcome');
});
