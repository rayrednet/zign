<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OAuthController;

// Route for the home page (welcome page)
Route::get('/', function () {
    return view('welcome');
});

// Route for handling Zoom OAuth callback
Route::get('/oauth/callback', [OAuthController::class, 'handleZoomCallback']);
