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
    return view('Ack.index');
});

//View all Ack Youth
Route::get('/members', 'YouthController@index');
//View a single youth details
Route::get('/profile/{id}','YouthController@show');
//Create a new member
Route:: post('/create','YouthController@store');
//Edit user details
Route::get('/edit/{id}', 'YouthController@edit');
//Update details
Route::put('/updatedetails/{id}', 'YouthController@update');
//Delete Details
Route::delete('/deletedetails/{id}','YouthController@destroy');
//Log in to the system
Route::post('/login','YouthController@login');
//Register a new Member
Route::get('/details','YouthController@create');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Fill in details for internship notification
Route::get('/internshipForm', 'YouthController@InternshipForm');
//Handle notification
Route::post('/internship', 'YouthController@InternshipSearch');
//Admin Login
Route::post('adminLogin', 'YouthController@adminLogin');
