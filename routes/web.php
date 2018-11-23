<?php

// Auth
Route::get('/', 'AuthController@showSignin')->name('show-signin');
Route::get('/sign-up', 'AuthController@showSignup')->name('show-signup');
Route::get('/about-global', 'AuthController@showAboutglobal')->name('aboutglobal');

Route::POST('/', 'AuthController@verifyUser');
Route::POST('/sign-up', 'AuthController@insertUser');

Route::get('/todo-list', 'HomeController@showHome')->name('showHome');
Route::get('/completed-todo-list', 'HomeController@showCompletedTodo')->name('showCompletedTodo');
Route::get('/about', 'HomeController@showAbout')->name('showAbout');

Route::get('/logout', 'HomeController@logout')->name('logout');

// Manage Todo
Route::POST('/add-todo', 'ManageTodoController@addTodo')->name('addtodo');
Route::POST('/set-complete', 'ManageTodoController@setComplete')->name('setComplete');
Route::POST('/update-todo', 'ManageTodoController@updateTodo')->name('updateTodo');
Route::POST('/delete-todo', 'ManageTodoController@deleteTodo')->name('deleteTodo');
