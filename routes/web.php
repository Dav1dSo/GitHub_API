<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\FilterLanguageController;

Route::get('/', [HomeController::class, 'Home']);
// Route::post('/searchRepositorio', [SearchController::class, 'Search']);
Route::post('/searchRepositorio', [SearchController::class, 'ServiceApi']);
Route::get('/filterLanguage', [FilterLanguageController::class, 'FilterLanguage']);
