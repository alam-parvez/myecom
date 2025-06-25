<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminMaincategoryController;
use App\Http\Controllers\Admin\AdminSubcategoryController;
use App\Http\Controllers\Admin\AdminBrandController;
use App\Http\Controllers\Admin\AdminTestimonialsController;
use App\Http\Controllers\Admin\AdminProductController;


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


    Route::group(["prefix" => "brand"], function () {
        Route::get("/", [AdminBrandController::class, "index"])->name("admin-brand");
        Route::get("/create", [AdminBrandController::class, "create"])->name("admin-create-brand");
        Route::post("/store", [AdminBrandController::class, "store"])->name("admin-store-brand");
        Route::get("/destroy{id}", [AdminBrandController::class, "destroy"])->name("admin-destroy-brand");
        Route::get("/edit/{id}", [AdminBrandController::class, "edit"])->name("admin-edit-brand");
        Route::post("/update/{id}", [AdminBrandController::class, "update"])->name("admin-update-brand");
    });


    Route::group(["prefix" => "testimonials"], function () {
        Route::get("/", [AdminTestimonialsController::class, "index"])->name("admin-testimonials");
        Route::get("/create", [AdminTestimonialsController::class, "create"])->name("admin-create-testimonials");
        Route::post("/store", [AdminTestimonialsController::class, "store"])->name("admin-store-testimonials");
        Route::get("/destroy{id}", [AdminTestimonialsController::class, "destroy"])->name("admin-destroy-testimonials");
        Route::get("/edit/{id}", [AdminTestimonialsController::class, "edit"])->name("admin-edit-testimonials");
        Route::post("/update/{id}", [AdminTestimonialsController::class, "update"])->name("admin-update-testimonials");
    });


    Route::group(["prefix" => "product"], function () {
        Route::get("/", [AdminProductController::class, "index"])->name("admin-product");
        Route::get("/create", [AdminProductController::class, "create"])->name("admin-create-product");
        Route::post("/store", [AdminProductController::class, "store"])->name("admin-store-product");
        Route::get("/destroy{id}", [AdminProductController::class, "destroy"])->name("admin-destroy-product");
        Route::get("/edit/{id}", [AdminProductController::class, "edit"])->name("admin-edit-product");
        Route::post("/update/{id}", [AdminProductController::class, "update"])->name("admin-update-product");
    });
});



require __DIR__ . '/auth.php';
