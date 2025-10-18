<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
});
Route::get('/skills', function () {
    return view('pages.skills');
});
Route::get('/projects', function () {
    return view('pages.projects');
});
