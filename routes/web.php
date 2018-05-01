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

Route::get('/', 'LeadController@create');

Route::put('/updateOrCreateLead', 'LeadController@updateOrCreate');

Route::get('/leads', 'LeadController@index')->name('leads.list');

Route::get('/lead/{id}', 'LeadController@show')->name('lead.detail');
