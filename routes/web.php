<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SustainabilityController;
use App\Http\Controllers\EsgController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/reload-captcha', function () {
    return response()->json([
        'url' => captcha_src(6) . '&_=' . time(),
    ])->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
      ->header('Pragma', 'no-cache');
})->name('captcha.refresh');



Route::get('/admin_login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin_login', [AdminController::class, 'login'])->name('exec_login_admin');

Auth::routes();



Route::middleware(['akses:all'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/questioner/{ques}/{sesi}', [SustainabilityController::class, 'index'])->name('questioner_sustainability');

    Route::post('/questioner/submit_form', [SustainabilityController::class, 'submit_form'])->name('submit_form');

    Route::get('/selesai-questioner', function () {
        return view('selesai_questioner');
    })->name('selesai_questioner');

    Route::get('/selesai-questioner_esg', function () {
        return view('selesai_questioner_esg');
    })->name('selesai_questioner_esg');



    Route::get('/esg', [EsgController::class, 'index'])->name('questioner_esg.home');
});

Route::middleware(['akses:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.home');
    Route::get('/admin_logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::get('/admin/dataquestioner/{ques}/{unit_kerja}', [AdminController::class, 'dataquestioner'])->name('dataquestioner');
    Route::post('/admin/getdataquestioner', [AdminController::class, 'getdataquestioner'])->name('admin.getdataquestioner');
});