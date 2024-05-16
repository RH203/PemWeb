<?php

use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/mahasiswa/create', [MahasiswaController::class, 'create']);
Route::get('/mahasiswa', [MahasiswaController::class, 'index']);
Route::get('/mahasiswa/{mahasiswa}', [MahasiswaController::class, 'show']);
Route::post('/mahasiswa', [MahasiswaController::class, 'store']);
Route::get('/mahasiswa/{mahasiswa}/edit', [MahasiswaController::class, 'edit']);
Route::put('/mahasiswa/{mahasiswa}', [MahasiswaController::class, 'update']);
Route::delete('/mahasiswa/{mahasiswa}', [MahasiswaController::class, 'destroy']);

