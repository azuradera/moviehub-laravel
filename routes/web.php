<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\Api\FilmApiController;

Route::apiResource('films', FilmApiController::class);

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    // Semua user (admin & biasa) boleh melihat daftar film
    Route::get('/film', [FilmController::class, 'index'])
        ->name('film.index');

    // Semua user boleh export PDF & Excel
    // PENTING: harus didaftarkan SEBELUM /film/{film}, kalau tidak
    // "pdf"/"excel" akan tertangkap sebagai parameter {film} dan 404.
    Route::get('/film/pdf', [ExportController::class, 'pdf'])
        ->name('film.pdf');

    Route::get('/film/excel', [ExportController::class, 'excel'])
        ->name('film.excel');

    // Hanya admin yang boleh tambah, edit, hapus film
    Route::middleware(['admin'])->group(function () {
        // /film/create juga harus SEBELUM /film/{film} dengan alasan sama
        Route::get('/film/create', [FilmController::class, 'create'])
            ->name('film.create');

        Route::post('/film', [FilmController::class, 'store'])
            ->name('film.store');

        Route::get('/film/{film}/edit', [FilmController::class, 'edit'])
            ->name('film.edit');

        Route::put('/film/{film}', [FilmController::class, 'update'])
            ->name('film.update');

        Route::delete('/film/{film}', [FilmController::class, 'destroy'])
            ->name('film.destroy');
    });

    // Detail film — didaftarkan PALING AKHIR di antara route /film/*
    // supaya tidak menangkap /film/pdf, /film/excel, /film/create duluan
    Route::get('/film/{film}', [FilmController::class, 'show'])
        ->name('film.show');

    // Manajemen User
    Route::resource('users', UserController::class)
        ->except(['show', 'create', 'store']);

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

require __DIR__.'/auth.php';