<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsLoggedIn;
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


// Spoker pages
    Route::get('/', 'Spoker\SpokerController@index');
    Route::post('/login', 'Spoker\Auth\loginController@login');
    Route::get('/logout', 'Spoker\Auth\logOutController@logout');

    // Dashboard
    Route::get('/dashboard', 'Spoker\SpokerController@spoker');

    // Assign Contact
    Route::get('/assign-contacts', 'Spoker\AssignContactsController@assign');
    
    // followup Contact
    Route::get('/followup-contacts', 'Spoker\FollowupController@followUp');
    Route::get('/past-followup-contacts', 'Spoker\FollowupController@pastFollowUp');
    Route::get('/today-followup-contacts', 'Spoker\FollowupController@todayFollowUp');
    Route::get('/future-followup-contacts', 'Spoker\FollowupController@futureFollowUp');



// Start Admin Pannel

    // login page
    Route::get('/admin', 'Admin\AdminController@index');
    Route::post('/admin/login', 'Admin\Auth\loginController@login');
    Route::get('/admin/logout', 'Admin\Auth\logOutController@logout');

    // Dashboard
    Route::get('/admin/dashboard', 'Admin\AdminController@admin');

    // start Spokers
        Route::get('/admin/spokers', 'Admin\SpokersController@index');
        Route::get('/admin/spokers/create', 'Admin\SpokersController@create');
        Route::post('/admin/spokers/store', 'Admin\SpokersController@store');
        Route::get('/admin/spokers/edit-{id}', 'Admin\SpokersController@edit');
        Route::get('/admin/spokers/delete-{id}', 'Admin\SpokersController@delete');
        Route::post('/admin/spokers/update-{id}', 'Admin\SpokersController@update');
    // end Spokers

    // start Contacts
        Route::get('/admin/contacts', 'Admin\ContactsController@index');
        Route::get('/admin/contacts/create', 'Admin\ContactsController@create');
        Route::post('/admin/contacts/store', 'Admin\ContactsController@store');
        Route::get('/admin/contacts/edit-{id}', 'Admin\ContactsController@edit');
        Route::get('/admin/contacts/delete-{id}', 'Admin\ContactsController@delete');
        Route::post('/admin/contacts/update-{id}', 'Admin\ContactsController@update');
        Route::post('/admin/contacts/import', 'Admin\ContactsController@import');
    // end Contacts


    
    // start Assign Contacts
        Route::get('/admin/assign-contacts', 'Admin\AssignContactsController@assign');
        Route::get('/admin/unassign-contacts', 'Admin\UnassignContactsController@unassign');
    // end Assign Contacts