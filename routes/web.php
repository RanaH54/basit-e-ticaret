<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageHomeController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\SepetController;
use App\Http\Controllers\UrunController;
use App\Http\Controllers\AuthController;

use App\User;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PageHomeController::class,'anasayfa'])->name('anasayfa');
Route::get('/sepet', [SepetController::class,'index'])->name('sepet');

Route::get('/users', [AuthController::class,'index'])->name('login');

Route::get('/login-popup', [AuthController::class, 'showPopupLoginForm'])->name('popup.login.form');
Route::get('/register-popup', [AuthController::class, 'showPopupRegisterForm'])->name('popup.register.form');

Route::post('/login-popup', [AuthController::class, 'login'])->name('popup.login');
Route::post('/register-popup', [AuthController::class, 'register'])->name('popup.register');


Route::group(['middleware' => ['auth']], function (){
//login olmayan buraları göremez
    Route::get('/profile', [AuthController::class,'profile'])->name('profile');
    Route::post('/profile/update', [AuthController::class, 'updateProfile'])->name('profile.update');
    Route::post('/profile/change-password', [AuthController::class, 'changePassword'])->name('profile.change.password');

    Route::post('/sepet/ekle', [SepetController::class,'add'])->name('sepet.add');
    Route::post('/sepet/sil', [SepetController::class,'remove'])->name('sepet.remove');
    Route::post('/confirm-order', [SepetController::class, 'confirmOrder'])->name('confirmOrder');
    Route::post('/iletisimkaydet', [AjaxController::class,'iletisimkaydet'])->name('iletisimkaydet');


    Route::post('/sepet/atistirmalikekle', [SepetController::class,'atistirmalikekle'])->name('sepet.atistirmalikekle');
    Route::post('/sepet/atistirmaliksil', [SepetController::class,'atistirmaliksil'])->name('sepet.atistirmaliksil');

    Route::post('/sepet/icecekekle', [SepetController::class,'icecekekle'])->name('sepet.icecekekle');
    Route::post('/sepet/iceceksil', [SepetController::class,'iceceksil'])->name('sepet.iceceksil');

    Route::post('/sepet/sosekle', [SepetController::class,'sosekle'])->name('sepet.sosekle');
    Route::post('/sepet/sossil', [SepetController::class,'sossil'])->name('sepet.sossil');

    Route::post('/sepet/tatliekle', [SepetController::class,'tatliekle'])->name('sepet.tatliekle');
    Route::post('/sepet/tatlisil', [SepetController::class,'tatlisil'])->name('sepet.tatlisil');

    Route::post('/pizzaekle', [SepetController::class, 'pizzaekle'])->name('sepet.pizzaekle');
    Route::post('/pizzasil', [SepetController::class, 'pizzasil'])->name('sepet.pizzasil');

    Route::post('/sepet/onayla', [SepetController::class, 'onayla'])->name('sepet.onayla');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

});





