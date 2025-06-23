<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use App\Http\Controllers\OlahragaController;
use App\Http\Controllers\HiburanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\OtomotifController;
use App\Http\Controllers\EsportController;
use App\Http\Controllers\TeknologiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;

Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'registerPage'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', [HomeController::class, 'index'], function () {
    return view('home', ['title' => 'Trending']);
})->name('home');

Route::get('/olahraga', [OlahragaController::class, 'index'], function () {
    return view('olahraga', ['title' => 'Olahraga']);
});

Route::get('/teknologi', [TeknologiController::class, 'index'], function () {
    return view('teknologi', ['title' => 'Teknologi']);
});

Route::get('/hiburan', [HiburanController::class, 'index'], function () {
    return view('hiburan', ['title' => 'Hiburan']);
});

Route::get('/otomotif', [OtomotifController::class, 'index'], function () {
    return view('otomotif', ['title' => 'Otomotif']);
});

Route::get('/esport', [EsportController::class, 'index'], function () {
    return view('esport', ['title' => 'Esport']);
});

Route::get('/search', [BeritaController::class, 'search'])->name('search');

Route::get('/{slug}', [BeritaController::class, 'show'])->name('show');

Route::post('/komentar', [CommentController::class, 'store'])->middleware('auth');