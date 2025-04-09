<?php

use App\Http\Controllers\ChamdiemController;
use App\Http\Controllers\NguoidungController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Http\Middleware\HandleCors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::options('/Dangnhap', [NguoidungController::class, 'getNguoidung'])->name('dangnhap')->withoutMiddleware([VerifyCsrfToken::class]);
Route::options('/Chamdiem', [ChamdiemController::class, 'chamDiem'])->name('chamdiem')->withoutMiddleware([VerifyCsrfToken::class]);