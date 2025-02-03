<?php

use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontController::class,"homePage"])->name("home");
Route::get('/about', [FrontController::class,"aboutPage"])->name("about");
Route::get('/shop', [FrontController::class,"shopPage"])->name("shop");
Route::get('/features', [FrontController::class,"featuresPage"])->name("features");
Route::get('/testimonials', [FrontController::class,"testimonialsPage"])->name("testimonials");
Route::get('/contact', [FrontController::class,"contactPage"])->name("contact");



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
