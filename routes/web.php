<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\StatsController;
use Illuminate\Support\Facades\Route;

Route::get('/stats', [StatsController::class, 'pages'])->name('stats.pages');
Route::get('/stats/detail', [StatsController::class, 'detail'])->name('stats.detail');
Route::get('/stats/services', [StatsController::class, 'serviceStats'])->name('stats.services');

Route::get('/', function () {
    return redirect()->route('country.index');
});

Route::resource('country', CountryController::class);

// Главная страница
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::resource('services', AppointmentController::class)->names([
    'index' => 'services.index',
    'store' => 'services.store',
])->parameters([
    'services' => 'appointment'
]);
