<?php

/**
 * All route names are prefixed with ''.
 */
Route::redirect('/', '/admin/dashboard', 301);
Route::get('dashboard', 'DashboardController@index')->name('dashboard');

Route::resource('election', 'Election\ElectionController');
Route::resource('places', 'Election\PlaceController');

Route::get('/field_agent/assign_station', 'Election\AgentAssignmentController@create')->name('field_agent.assign.create');
Route::post('/field_agent/{user}/assign_station', 'Election\AgentAssignmentController@store')->name('field_agent.assign.store');

Route::get('/field_agent/index', 'Election\FieldAgentController@index')->name('field_agent.index');
Route::post('/field_agent/index', 'Election\FieldAgentController@storeVotes')->name('field_agent.store.votes');

Route::get('/field_agent/election/{election}/submit_data', 'Election\ElectionController@electionDataForms')->name('election.dataforms');

Route::post('/field_agent/election/{election}/image_upload', 'Election\ElectionController@storeElectionImage')->name('election.store.image');
Route::post('/field_agent/election/{election}/submit_data', 'Election\ElectionController@electionDataStore')->name('election.data.store');

Route::post('/election/{election}/add_candidate', 'Election\AspirantController@addCandidate')->name('add.aspirant');
