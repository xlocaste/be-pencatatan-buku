<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BukuController;

Route::get('/kategori', [KategoriController::class, 'index']);
Route::post('/kategori', [KategoriController::class, 'store']);
Route::get('/kategori/{kategori}', [KategoriController::class, 'show']);
Route::put('/kategori/{kategori}', [KategoriController::class, 'update']);
Route::delete('/kategori/{kategori}', [KategoriController::class, 'destroy']);

Route::get('/buku', [BukuController::class, 'index']);
Route::post('/buku', [BukuController::class, 'store']);
Route::get('/buku/{buku}', [BukuController::class, 'show']);
Route::put('/buku/{buku}', [BukuController::class, 'update']);
Route::delete('/buku/{buku}', [BukuController::class, 'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
