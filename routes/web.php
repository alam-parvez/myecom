<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminMaincategoryController;
use App\Http\Controllers\Admin\AdminSubcategoryController;


Route::get('/', [FrontController::class, "homePage"])->name("home");
Route::get('/about', [FrontController::class, "aboutPage"])->name("about");
Route::get('/shop', [FrontController::class, "shopPage"])->name("shop");
Route::get('/features', [FrontController::class, "featuresPage"])->name("features");
Route::get('/testimonials', [FrontController::class, "testimonialsPage"])->name("testimonials");
Route::get('/contact', [FrontController::class, "contactPage"])->name("contact");



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::group(["prefix" => "admin"], function () {
    Route::get("/", [AdminHomeController::class, "index"])->name("admin-home");



Route::group(["prefix" => "maincategory"], function () {
    Route::get("/", [AdminMaincategoryController::class, "index"])->name("admin-maincategory");
    Route::get("/create", [AdminMaincategoryController::class, "create"])->name("admin-create-maincategory");
    Route::post("/store", [AdminMaincategoryController::class, "store"])->name("admin-store-maincategory");
    Route::get("/destroy{id}", [AdminMaincategoryController::class, "destroy"])->name("admin-destroy-maincategory");
    Route::get("/edit/{id}", [AdminMaincategoryController::class, "edit"])->name("admin-edit-maincategory");
    Route::post("/update/{id}", [AdminMaincategoryController::class, "update"])->name("admin-update-maincategory");
});



Route::group(["prefix" => "subcategory"], function () {
    Route::get("/", [AdminSubcategoryController::class, "index"])->name("admin-subcategory");
    Route::get("/create", [AdminSubcategoryController::class, "create"])->name("admin-create-subcategory");
    Route::post("/store", [AdminSubcategoryController::class, "store"])->name("admin-store-subcategory");
    Route::get("/destroy{id}", [AdminSubcategoryController::class, "destroy"])->name("admin-destroy-subcategory");
    Route::get("/edit/{id}", [AdminSubcategoryController::class, "edit"])->name("admin-edit-subcategory");
    Route::post("/update/{id}", [AdminSubcategoryController::class, "update"])->name("admin-update-subcategory");
});
});



require __DIR__ . '/auth.php';
