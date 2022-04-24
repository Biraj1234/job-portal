<?php

use Illuminate\Support\Facades\Route;


Route::get('/home', 'Backend\DashboardController@index')->name('home')->middleware('auth');
Route::get('/assign/{role_id}', 'Backend\RoleController@assignRole')->name('role.assign');
Route::get('/postPermission', 'Backend\RoleController@postPermission')->name('permission');


Route::prefix('backend/')->name('backend.')->group(function () {
    Route::get('category/trash', 'Backend\CategoryController@trash')->name('category.trash');
    Route::post('category/{id}/restore', 'Backend\CategoryController@restore')->name('category.restore');
    Route::delete('category/{id}/force-delete', 'Backend\CategoryController@forceDelete')->name('category.force_delete');
    Route::resource('category', 'Backend\CategoryController');

    Route::resource('type', 'Backend\TypeController');
    Route::resource('job_level', 'Backend\JobLevelController');
    Route::resource('user', 'Backend\UserController');
    Route::resource('profile', 'Backend\ProfileController');
    Route::resource('role', 'Backend\RoleController');
    Route::resource('module', 'Backend\ModuleController');
    Route::resource('permission', 'Backend\PermissionController');
    Route::resource('location', 'Backend\LocationController');
    Route::resource('skill', 'Backend\SkillController');
});
