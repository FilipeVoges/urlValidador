<?php

Route::get('autenticar', function () {
    return redirect('/');
});

Route::get('login', 'LoginController@login');
Route::post('autenticar', 'LoginController@autenticar');

Route::get('logout', 'LoginController@logout')->middleware('login');
Route::get('/', 'EndpointController@init')->middleware('login');


