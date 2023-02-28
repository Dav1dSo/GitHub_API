<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;

Route::get('/', [HomeController::class, 'Home']);
Route::post('/searchRepositorio', [SearchController::class, 'Search']);
