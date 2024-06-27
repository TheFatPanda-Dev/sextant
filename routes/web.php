<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebpagesLinksController;
use App\Http\Controllers\SSLController;

Route::get('/', function () {
    return view('dashboard');
})->middleware('auth');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/servers', function () {
    return view('servers');
})->name('servers');

Route::get('/webapps', function () {
    return view('webapps');
})->name('webapps');

Route::post('/webpages_links', [WebpagesLinksController::class, 'store'])->name('webpages_links.store');

Route::get('/certificate', [SSLController::class, 'getCertificateInfo'])->name('certificate');
