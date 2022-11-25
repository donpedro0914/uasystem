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
Route::get('/', 'FrontController@index');
Route::get('/job-hiring', 'FrontController@job_hiring')->name('job-hiring');
Route::get('jobs/info/{id}', 'FrontController@jobs_info')->name('jobs.info');

Auth::routes();

/* Dashboard */
Route::get('/dashboard', 'HomeController@index');
Route::get('/logout', 'HomeController@logout');

/* My Profile */
Route::get('/myprofile/{id}', 'FrontController@profile')->name('profile');
Route::post('/myprofile/update/{id}', 'FrontController@profile_update')->name('profile.update');
Route::post('/downloadcv', 'FrontController@downloadcv')->name('downloadcv');

/* Jobs */
Route::get('/jobs', 'HomeController@jobs')->name('jobs');
Route::post('/jobs/store', 'HomeController@jobs_store')->name('jobs.store');
Route::get('/jobs/edit/{id}', 'HomeController@jobs_edit')->name('jobs.edit');
Route::post('/jobs/update/{id}', 'HomeController@jobs_update')->name('jobs.update');
Route::post('/applyjob', 'HomeController@applyjob')->name('applyjob');
Route::delete('job/delete/{id}', 'HomeController@delete_job')->name('delete_job');

/* Companies */
Route::get('/companies', 'CompanyController@index')->name('companies');
Route::post('/company/store', 'CompanyController@store')->name('company.store');
Route::get('/company/edit/{id}', 'CompanyController@edit')->name('company.edit');

/* Applicants */
Route::get('/applicants', 'HomeController@applicants')->name('applicants');