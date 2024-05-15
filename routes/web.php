<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\TagAdminController;
use App\Http\Controllers\Admin\NewsAdminController;



Route::get('/', [NewsController::class, 'index'])->name('news.index');






Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/admin/news/', [NewsAdminController::class, 'index'])->name('admin.news.index')->middleware('auth');
    Route::get('/admin/news/create', [NewsAdminController::class, 'create'])->name('admin.news.create')->middleware('auth');
    Route::post('/admin/news', [NewsAdminController::class, 'store'])->name('admin.news.store')->middleware('auth');
    Route::get('/admin/news/{news:slug}/edit', [NewsAdminController::class, 'edit'])->name('admin.news.edit')->middleware('auth');
    Route::put('/admin/news/{news:slug}/update', [NewsAdminController::class, 'update'])->name('admin.news.update')->middleware('auth');
    Route::delete('/admin/news/{news:slug}/delete', [NewsAdminController::class, 'destroy'])->name('admin.news.destroy')->middleware('auth');

    Route::get('/admin/tags/', [TagAdminController::class, 'index'])->name('admin.tags.index')->middleware('auth');
    Route::get('/admin/tags/{tag:slug}/edit', [TagAdminController::class, 'edit'])->name('admin.tags.edit')->middleware('auth');
    Route::put('/admin/tags/{tag:slug}/update', [TagAdminController::class, 'update'])->name('admin.tags.update')->middleware('auth');
    Route::delete('/admin/tags/{tag:slug}/delete', [TagAdminController::class, 'destroy'])->name('admin.tags.destroy')->middleware('auth');
});

require __DIR__ . '/auth.php';


Route::get('/news/{news:slug}', [NewsController::class, 'show'])->name('news.show');
