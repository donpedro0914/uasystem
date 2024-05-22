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
Route::get('/users', 'HomeController@users')->name('users');
Route::get('/user/view/{id}', 'HomeController@view_user')->name('user.edit');
Route::post('user/update/{id}', 'HomeController@update_user')->name('admin.update.user');
Route::post('user/register', 'HomeController@user_register')->name('user.register');

/* Alumni */
Route::get('/alumni', 'AlumniController@index')->name('alumni');
Route::post('/alumni/store', 'AlumniController@store')->name('alumni.store');

/* My Profile */
Route::get('/myprofile/{id}', 'FrontController@profile')->name('profile');
Route::post('/myprofile/update/{id}', 'FrontController@profile_update')->name('profile.update');
Route::get('/downloadcv/{file}', 'FrontController@downloadcv')->name('downloadcv');

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
Route::get('/company/dashboard', 'CompanyController@company_index')->name('company.dashboard');
Route::get('/company/jobs', 'CompanyController@jobs')->name('company.jobs');
Route::post('/company/jobs/store', 'CompanyController@jobs_store')->name('company.jobs.store');
Route::get('/company/jobs/edit/{id}', 'CompanyController@jobs_edit')->name('company.jobs.edit');
Route::post('/company/jobs/update/{id}', 'CompanyController@jobs_update')->name('company.jobs.update');

/* Applicants */
Route::get('/applicants', 'HomeController@applicants')->name('applicants');
Route::get('/applicant/{id}', 'HomeController@view_applicant')->name('applicant.view');
Route::get('/application/{id}', 'HomeController@view_application')->name('application.view');
Route::get('/company/applicants', 'CompanyController@applicants')->name('company.applicants');
Route::get('/company/applicant/{id}', 'CompanyController@view_applicant')->name('company.applicant.view');
Route::get('/company/view-application/{id}', 'CompanyController@view_application')->name('company.application.view');
Route::post('/approveapplication', 'CompanyController@approveapplication')->name('approveapplication');
Route::post('/rejectapplication', 'CompanyController@rejectapplication')->name('rejectapplication');
Route::post('/initialapplication', 'CompanyController@initialapplication')->name('initialapplication');
Route::post('/examapplication', 'CompanyController@examapplication')->name('examapplication');
Route::post('/finalapplication', 'CompanyController@finalapplication')->name('finalapplication');
Route::get('/export-application/{id}', 'CompanyController@export')->name('applicant.export');

/* Admin Users */
Route::get('admin-users', 'HomeController@admin_users')->name('admin.users');