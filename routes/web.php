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

Route::post('/checkalumni', 'FrontController@checkalumni');
Route::post('/checkalumnidup', 'FrontController@checkalumnidup');

/* Thank you */
Route::get('thank-you', 'FrontController@thankyou')->name('thankyou');

Auth::routes();

/* Dashboard */
Route::get('/dashboard', 'HomeController@index');
Route::get('/logout', 'HomeController@logout');

/* Alumni */
Route::get('/alumni', 'AlumniController@index')->name('alumni');
Route::post('/alumni/store', 'AlumniController@store')->name('alumni.store');

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
Route::get('/partner-registration', 'CompanyController@registration')->name('company.registration');
Route::post('/partner/store', 'CompanyController@store')->name('company.store');
Route::get('/company/view/{id}', 'CompanyController@view_company')->name('company.edit');
Route::post('/company/update/{id}', 'CompanyController@update_company')->name('company.update');

/* Applicants */
Route::get('/applicants', 'HomeController@applicants')->name('applicants');