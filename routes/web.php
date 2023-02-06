<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return Redirect::to('payments');
});

Route::get('payments', function () {
    return view('payments');
});

Route::get('admin/dashboard', function () {
    return Redirect::to('payments');
});