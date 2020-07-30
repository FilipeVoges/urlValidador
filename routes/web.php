<?php

Route::get('/', function () {
    // Usar Middlewere seria o ideal
    if (!request()->session()->has('user')) {
        return redirect('login');
    }
    return view('home');
});

Route::get('login', 'LoginController@login');
Route::post('autenticar', 'LoginController@autenticar');
Route::get('autenticar', function () {
    return redirect('/');
});
Route::get('logout', 'LoginController@logout');

