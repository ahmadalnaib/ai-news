<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\NewsAdminController;



Route::get('/', [NewsController::class, 'index'])->name('news.index');






Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/admin/news/create', [NewsAdminController::class, 'create'])->name('news.create')->middleware('auth');
    Route::post('/admin/news', [NewsAdminController::class, 'store'])->name('news.store')->middleware('auth');
});

require __DIR__ . '/auth.php';


Route::get('/news/{news:slug}', [NewsController::class, 'show'])->name('news.show');
