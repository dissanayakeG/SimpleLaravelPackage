<?php

use Illuminate\Support\Facades\Route;

Route::get('/everest-default-web-route', function () {
    return view('everest::welcome');
    // return 'pckg-default-web-route';
});