<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CharacterController;

use App\Http\Controllers\CityController;

use App\Http\Controllers\CityManageController;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\GenshinController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/', [HomeController::class, 'index'])->name('index');
// Route::get('/', [HomeController::class, 'index']);

Route::get('/genshinList', [GenshinController::class, 'index']);

Route::get('/cityList', [CityController::class, 'index']);



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('posts', PostController::class);

    Route::resource('characters', CharacterController::class);

    Route::resource('citys', CityManageController::class);
});

require __DIR__.'/auth.php';
