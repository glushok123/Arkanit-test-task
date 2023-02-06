<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('add-payments', 'App\Http\Controllers\PaymentsController@create');

Route::get('get-payments','App\Http\Controllers\PaymentsController@index')->name('payments.index');
Route::post('change-status-payment','App\Http\Controllers\PaymentsController@change')->name('payments.change');