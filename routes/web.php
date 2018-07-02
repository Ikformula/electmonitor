<?php

/**
 * Global Routes
 * Routes that are used between both frontend and backend.
 */

// Switch between the included languages
Route::get('lang/{lang}', 'LanguageController');

/*
 * Frontend Routes
 * Namespaces indicate folder structure
 */
Route::group(['namespace' => 'Frontend', 'as' => 'frontend.'], function () {
    include_route_files(__DIR__.'/frontend/');
});

/*
 * Backend Routes
 * Namespaces indicate folder structure
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    /*
     * These routes need view-backend permission
     * (good if you want to allow more than one group in the backend,
     * then limit the backend features by different roles or permissions)
     *
     * Note: Administrator has all permissions so you do not have to specify the administrator role everywhere.
     * These routes can not be hit if the password is expired
     */
    include_route_files(__DIR__.'/backend/');
});


Route::get('/election-results', 'ElectionResultsController@resultForm')->name('election.result');
Route::post('/election-results', 'ElectionResultsController@electionsList')->name('election.results.show');
//Route::get('/elections-list', 'ElectionResultsController@electionsList')->name('election.list');
Route::get('/places', 'PlacesController@getPlaces')->name('places.ajax');

Route::get('/election-results/{election}', 'ElectionResultsController@electionResults')->name('single.results');