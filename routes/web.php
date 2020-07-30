<?php

Route::get('autenticar', function () {
    return redirect('/');
});

Route::get('roboDaInterwebs', 'QueueController@run');
Route::get('login', 'LoginController@login');
Route::post('autenticar', 'LoginController@autenticar');

Route::get('logout', 'LoginController@logout')->middleware('login');
Route::get('/', 'EndpointController@init')->middleware('login');
Route::get('register', 'EndpointController@register')->middleware('login');
Route::get('delete/{id}', 'EndpointController@delete')->middleware('login');
Route::get('see/{id}', 'EndpointController@see')->middleware('login');
Route::post('register', 'EndpointController@registration')->middleware('login');


