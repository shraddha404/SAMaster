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

Route::get('/', function () {
    //return view('welcome');
    return redirect('/home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/organizations', 'OrgController@index')->middleware('auth');
Route::get('/org/new', 'OrgController@org_form')->middleware('auth');
Route::get('/org/{org_id}/edit', 'OrgController@org_form')->middleware('auth');
Route::post('/org/save', 'OrgController@save')->middleware('auth');
