<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PremierLeagueController;
use App\Http\Controllers\Api\KtpCheckController;

Route::get('/', function () {
    return view('welcome');
});


