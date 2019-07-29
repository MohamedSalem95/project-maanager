<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'ProjectsController@index')->name('home');

Auth::routes();


Route::resource('projects', 'ProjectsController');
Route::post('projects/{project}/addUser', 'ProjectsController@addUser')->name('projects.addUser');
Route::get('projects/{project}/remove/{user}', 'projectsController@removeUser')->name('projects.removeUser');
Route::resource('projects.tasks', 'TasksController');
