<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'Frontend\HomeController@index')->name('/');
Route::post('/search', 'Frontend\HomeController@search')->name('search');
Route::get('/category/{slug}', 'Frontend\HomeController@categorySearch')->name('category');
Route::get('/jobs', 'Frontend\HomeController@jobs')->name('jobs');
Route::get('/about', 'Frontend\HomeController@about')->name('about');
Route::get('/contact', 'Frontend\HomeController@contact')->name('contact');


//For jobseeker
Route::get('jobseeker/signin', 'Frontend\JobSeekerController@signin')->name('jobseeker.signin');
Route::get('jobseeker/signout', 'Frontend\JobSeekerController@logout')->name('jobseeker.signout');
Route::post('jobseeker/login', 'Frontend\JobSeekerController@login')->name('jobseeker.login');


Route::group(['namespace' => 'Frontend', 'middleware' => 'checkJobseeker', 'prefix' => 'jobseeker', 'as' => 'jobseeker.'], function () {
  Route::get('dashboard', 'JobSeekerController@dashboard')->name('dashboard.index');
  Route::get('jobs', 'JobSeekerController@appliedJobs')->name('jobs');
  Route::post('apply', 'JobSeekerController@apply')->name('apply');
  Route::get('profile', 'JobSeekerController@profile')->name('profile');
});


//For Employer
Route::get('employer/signin', 'Frontend\EmployerController@signin')->name('employer.signin');
Route::post('employer/login', 'Frontend\EmployerController@login')->name('employer.login');
Route::get('employer/signout', 'Frontend\EmployerController@logout')->name('employer.signout');
Route::get('/download/{id}', 'Frontend\EmployerController@downloadResume')->name('downloads');

Route::group(['namespace' => 'Frontend', 'middleware' => 'checkEmployer', 'prefix' => 'employer', 'as' => 'employer.'], function () {

  Route::get('dashboard', 'EmployerController@dashboard')->name('dashboard.index');
  Route::get('jobs', 'EmployerController@jobsList')->name('dashboard.jobs');
  Route::get('profile', 'EmployerController@profile')->name('profile');
  Route::get('application', 'EmployerController@applications')->name('applications');
  Route::get('detail/{id}', 'EmployerController@applicantsDetail')->name('applications.detail');
  Route::post('autocomplete', 'JobController@getAutocomplete')->name('Autocomplte.getAutocomplte');
});






Route::prefix('frontend/')->name('frontend.')->group(function () {
  Route::resource('employer', 'Frontend\EmployerController');
  Route::resource('jobseeker', 'Frontend\JobSeekerController');
  Route::resource('job', 'Frontend\JobController');
  Route::resource('education', 'Frontend\EducationController');
});
