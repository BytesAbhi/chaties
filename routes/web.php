<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\PhotoController;


use Illuminate\Support\Facades\Auth;
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');

Route::post('/register', [RegisterController::class, 'register']);

Route::get('auth/google', [App\Http\Controllers\Auth\RegisterController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback', [App\Http\Controllers\Auth\RegisterController::class, 'handleGoogleCallback']);

// Add route for editing participant data
Route::get('/participants/{id}/edit', [ParticipantController::class, 'edit'])->name('participants.edit');
Route::put('/participants/{id}', [ParticipantController::class, 'update'])->name('participants.update');

Route::get('/certificate/download', [App\Http\Controllers\CertificateController::class, 'download'])->name('certificate.download');


Route::get('/userdashboard', [ParticipantController::class, 'index'])->name('userdashboard');
Route::post('logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

Route::get('/usersall', [ParticipantController::class, 'create']);

Route::post('/participants', [ParticipantController::class, 'store'])->middleware('auth')->name('participants.store');

Route::post('/photos/upload', [PhotoController::class, 'upload'])->middleware('auth')->name('photos.upload');

Route::get('/certificates/download/{participant}', [CertificateController::class, 'download'])->middleware('auth')->name('certificates.download');

Route::get('/certificates/order/{participant}', [CertificateController::class, 'order'])->middleware('auth')->name('certificates.order');

Route::post('/certificates/order', [CertificateController::class, 'storeOrder'])->middleware('auth')->name('certificates.order.store');
