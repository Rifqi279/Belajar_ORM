<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaryawanController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/karyawan', [KaryawanController::class, 'index']); //READ
Route::post('/karyawan', [KaryawanController::class, 'store']); //CREATE
Route::put('/karyawan/{id}', [KaryawanController::class, 'update']); //UPDATE
Route::delete('/karyawan/{id}', [KaryawanController::class, 'destroy']); //DELETE
