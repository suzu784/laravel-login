<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['guest']], function() {
    // ログインフォーム表示
    Route::get('/', [AuthController::class, 'showLogin'])->name('showLogin');
    
    // ログイン処理
    Route::post('login', [AuthController::class, 'login'])->name('login');
});

Route::group(['middleware' => ['auth']], function() {
    // プロフィール画面に遷移
    Route::get('home', function() {
        return view('home');
    })->name('home');

    // ログアウト
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});