<?php
use Illuminate\Http\Request;
use App\Http\Controllers\BaithiController;
use App\Http\Controllers\ChamdiemController;
use App\Http\Controllers\ChitietbaithiController;
use App\Http\Controllers\NguoidungController;
use App\Http\Controllers\RouteController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Http\Middleware\HandleCors;
use Illuminate\Support\Facades\Route;
Route::get('/', function(){
    return view('apiview');
})->name('dsRoute');
Route::get('/Baithi', [BaithiController::class, 'getDSBaithi'])->name('laydsbaithi');
Route::get('/Baithi/{id}', [BaithiController::class, 'getBaithi'])->name('laybaithi');
Route::get('/BaithiTimkiem', [BaithiController::class, 'getDSTimBaithi'])->name('laydstimbaithi');
Route::post('/Thembaithi', [BaithiController::class, 'themBaithi'])->name('thembaithi')->withoutMiddleware([VerifyCsrfToken::class]);
Route::post('/Dangnhap', [NguoidungController::class, 'getNguoidung'])->name('dangnhap')->withoutMiddleware([VerifyCsrfToken::class]);
Route::get('/Chitietbaithi/{id}', [ChitietbaithiController::class, 'getToanBaiThi'])->name('laytoanbaithi');

Route::post('/Chamdiem', [ChamdiemController::class, 'chamDiem'])->name('chamdiem')->withoutMiddleware([VerifyCsrfToken::class]);