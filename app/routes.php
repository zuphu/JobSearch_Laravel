<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::post('user/login', array('as' => 'user.login', 'uses' => 'UserController@login'));
Route::get('user/logout', array('as' => 'user.logout', 'uses' => 'UserController@logout'));
Route::get('jobseeker/apply', array('as' => 'jobseeker.apply', 'uses' => 'JobSeekerController@apply'));
Route::get('jobseeker/application/{id}', array('as' => 'jobseeker.application', 'uses' => 'JobSeekerController@application'));

Route::get('employer/applicants/{id}', array('as' => 'employer.applicants', 'uses' => 'EmployerController@applicants'));

Route::get('employer/applicantdetails/{id}', array('as' => 'employer.applicantdetails', 'uses' => 'EmployerController@applicantdetails'));

Route::post('jobseeker/search', array('as' => 'jobseeker.search', 'uses' => 'JobSeekerController@search'));
Route::get('/', array('as' => 'index', 'uses' => 'UserController@index'));

Route::get('doc', array('as' => 'readme.doc', 'uses' => 'UserController@readMe'));

Route::resource('user',      'UserController');
Route::resource('employer',  'EmployerController');
Route::resource('jobseeker', 'JobSeekerController');