<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CnnDetailController;
use App\Http\Controllers\Api\VivaDetailController;

Route::get('/cnn/detail', [CnnDetailController::class,'getDetail']);
Route::get('/cnbc/detail', [VivaDetailController::class,'getDetail']);


