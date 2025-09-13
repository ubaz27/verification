<?php

use App\Http\Controllers\Member\ReportController;
use App\Http\Controllers\Member\ApplicationController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Member\DashboardController;
use App\Http\Controllers\Member\EventController;
use App\Http\Controllers\Member\LoginController;
use App\Http\Controllers\Member\NewsController;
use App\Http\Controllers\Member\PaymentController;
use App\Http\Controllers\Member\PaystackController;
use App\Http\Controllers\Member\ProfessionalController;
use App\Http\Controllers\Member\ProfileController;
use \App\Http\Controllers\Member\RegisterController;
use App\Http\Controllers\Member\SkillController;
use App\Http\Controllers\Member\SocialController;

Route::get('/', function () {
    return redirect()->route('member.showLogin');
});
Route::get('/', [LoginController::class, 'showLogin'])->name('showLogin');
Route::get('/login', [LoginController::class, 'showLogin'])->name('showLogin');
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('show-register', [RegisterController::class, 'showRegister'])->name('showRegister');
Route::post('/register', [RegisterController::class, 'saveRegister'])->name('saveRegister');

Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->name('showDashboard');

Route::get('/profile', [ProfileController::class, 'showProfile'])->name('showProfile');
Route::post('/profile-save', [ProfileController::class, 'saveProfile'])->name('saveProfile');
Route::post('/fetchState', [ProfileController::class, 'fetchState'])->name('fetchState');



//change password
Route::get('/change-password', [LoginController::class, 'showChangePassword'])->name('showChangePassword');
Route::post('/change-password', [LoginController::class, 'saveChangePassword'])->name('saveChangePassword');



//passport
Route::get('/passport', [ProfileController::class, 'showPassport'])->name('showPassport');
Route::post('/save-passport', [ProfileController::class, 'uploadPassport'])->name('uploadPassport');
Route::get('/signature', [ProfileController::class, 'showSignature'])->name('showSignature');
Route::post('/save-signature', [ProfileController::class, 'uploadSignature'])->name('uploadSignature');



Route::get('/professional', [ProfessionalController::class, 'showProfessional'])->name('showProfessional');
Route::post('/professional-save', [ProfessionalController::class, 'saveProfessional'])->name('saveProfessional');
Route::post('/get-professional-data', [ProfessionalController::class, 'getProfessionals'])->name('getProfessionals');
Route::get('/professional/delete/{id}', [ProfessionalController::class, 'deleteProfessional'])->name('deleteProfessional');


Route::get('/skill', [SkillController::class, 'showSkill'])->name('showSkill');
Route::post('/skill-save', [SkillController::class, 'saveSkill'])->name('saveSkill');


Route::get('/social', [SocialController::class, 'showSocial'])->name('showSocial');
Route::post('/social-save', [SocialController::class, 'saveSocial'])->name('saveSocial');


Route::get('/events', [EventController::class, 'showEvent'])->name('showEvent');
Route::post('/events-save', [EventController::class, 'saveEvent'])->name('saveEvent');


Route::get('/news', [NewsController::class, 'showNews'])->name('showNews');
Route::post('/news-save', [NewsController::class, 'saveNews'])->name('saveNews');



// id card
Route::get('/idcard', [PaymentController::class, 'showIDCard'])->name('showIDCard');
// Route::post('/save-idcard', [PaymentController::class, 'uploadSignature'])->name('uploadSignature');
Route::get('/idcard-invoice', [PaymentController::class, 'showInvoice'])->name('showInvoice');
Route::post('/generate-idcard-invoice', [PaymentController::class, 'generateInvoice'])->name('generateInvoice');
Route::post('/invoice/download', [ReportController::class, 'downloadInvoice'])->name('downloadInvoice');
Route::post('/receipt/download', [ReportController::class, 'donwloadReceipt'])->name('donwloadReceipt');
Route::get('/show/payment', [PaymentController::class, 'showMakePayment'])->name('showMakePayment');
Route::post('/make/payment', [PaymentController::class, 'makePayment'])->name('makePayment');
//paystack payment
Route::get('callback', [PaystackController::class, 'callback'])->name('callback');
Route::get('success', [PaystackController::class, 'success'])->name('success');
Route::get('cancel', [PaystackController::class, 'cancelled'])->name('cancelled');
//end of idcard

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
