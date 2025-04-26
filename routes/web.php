<?php
use Illuminate\Http\Request;
use App\Http\Controllers\BaithiController;
use App\Http\Controllers\ChamdiemController;
use App\Http\Controllers\ChitietbaithiController;
use App\Http\Controllers\KetquaController;
use App\Http\Controllers\NguoidungController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\TheloaiController;
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

Route::get('/Ketqua/{id}', [KetquaController::class, 'getDSKQ'])->name('laydskq');

Route::get('/Theloai', [TheloaiController::class, 'getDSTheloai'])->name('laydstl');

Route::get('/BaithiNgD/{id}', [BaithiController::class, 'getDSBaithiID'])->name('laydsbtnd');

Route::get('/Chitietchinhsua/{id}', [BaithiController::class, 'getCTBaiThiCauHoi'])->name('layctbtch');

Route::post('/Themchitiet', [ChitietbaithiController::class, 'themCauhoicautraloi'])->name('themchitiet')->withoutMiddleware([VerifyCsrfToken::class]);

Route::delete('/Xoabaithi/{id}', [BaithiController::class, 'xoaDethi'])->name('xoadethi')->withoutMiddleware([VerifyCsrfToken::class]);

Route::get('/CTBaithi/{id}', [BaithiController::class, 'getCTBaithi'])->name('chitietchinhsua');

Route::put('/Chinhsua/{id}', [BaithiController::class, 'suaDethi'])->name('suadethi')->withoutMiddleware([VerifyCsrfToken::class]);