<?php

use App\Http\Controllers\UssdController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::post('/ussd/callback', [UssdController::class, 'handle']);
