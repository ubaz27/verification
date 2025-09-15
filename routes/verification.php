<?php


use App\Http\Controllers\Verification\ReportController;
use App\Http\Controllers\Verification\ApplicationController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Verification\DashboardController;
use App\Http\Controllers\Verification\LoginController;
use App\Http\Controllers\Verification\PaymentController;
use App\Http\Controllers\Verification\ProfileController;
use \App\Http\Controllers\Verification\RegisterController;
use App\Http\Controllers\Verification\VerifyController;

Route::get('/', function () {
    return redirect()->route('verification.showLogin');
});
Route::get('/', [LoginController::class, 'showLogin'])->name('showLogin');
Route::get('/login', [LoginController::class, 'showLogin'])->name('showLogin');
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/register', [RegisterController::class, 'showRegister'])->name('showRegister');
Route::post('/register', [RegisterController::class, 'saveRegister'])->name('saveRegister');

Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->name('showDashboard');

Route::get('/profile', [ProfileController::class, 'showProfile'])->name('showProfile');
Route::post('/profile-save', [ProfileController::class, 'saveProfile'])->name('saveProfile');

//verify
Route::get('/verify', [VerifyController::class, 'showVerify'])->name('showVerify');
Route::post('/search-certificate', [VerifyController::class, 'searchCertificateNo'])->name('searchCertificateNo');
Route::post('/display-certificate', [VerifyController::class, 'displayCertificateNo'])->name('displayCertificateNo');


//Invoice
Route::post('/get-invoicelist', [PaymentController::class, 'getInvoiceList'])->name('getInvoiceList');
Route::post('/generate-invoice', [PaymentController::class, 'generateInvoice'])->name('generateInvoice');
Route::get('download-certificate/{id}', [VerifyController::class, 'downloadCertificate'])->name('downloadCertificate');

// //change password
// Route::get('/change-password', [LoginController::class, 'showChangePassword'])->name('showChangePassword');
// Route::post('/change-password', [LoginController::class, 'saveChangePassword'])->name('saveChangePassword');



// //passport
// Route::get('/passport', [ProfileController::class, 'showPassport'])->name('showPassport');
// Route::post('/save-passport', [ProfileController::class, 'uploadPassport'])->name('uploadPassport');
// Route::get('/signature', [ProfileController::class, 'showSignature'])->name('showSignature');
// Route::post('/save-signature', [ProfileController::class, 'uploadSignature'])->name('uploadSignature');



Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
