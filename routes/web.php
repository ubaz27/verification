<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\NewsEventController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ScholarshipController;
use App\Http\Controllers\ExecutiveController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\IDCardController;
use App\Http\Controllers\ScholarshipInquiryController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', [IndexController::class, 'showIndex'])->name('showIndex');

Route::get('/alumni', function () {
    return view('public.alumni');
});
Route::get('/chapters', function () {
    return view('public.chapters');
});
Route::get('/scholarships', [ScholarshipController::class, 'index'])->name('scholarships.index');
Route::get('/scholarships/{id}', [ScholarshipController::class, 'show'])->name('scholarships.show');
Route::get('/scholarships/type/{type}', [ScholarshipController::class, 'getByType'])->name('scholarships.by-type');
Route::post('/scholarships/inquiry', [ScholarshipInquiryController::class, 'submit'])->name('scholarships.inquiry.submit');

// Admin routes for scholarship management (you can protect these with middleware later)


// Route::get('/job-adverts', function () {
//     return view('public.job-adverts');
// });

Route::get('/job-adverts', [JobController::class, 'showJobs'])->name('showJobs');
Route::post('/submit/job', [JobController::class, 'saveJob'])->name('saveJob');


Route::get('/news-events', [NewsEventController::class, 'showEventNews'])->name('showEventNews');
Route::get('/contact', function () {
    return view('public.contact');
});
Route::post('/contact/submit', [ContactController::class, 'submit'])->name('contact.submit');
Route::get('/membership', function () {
    return view('public.membership');
});

Route::get('/about', [AboutController::class, 'about'])->name('about');
// Executive routes
Route::get('/executives', [ExecutiveController::class, 'index'])->name('executives.index');
Route::get('/executives/{id}', [ExecutiveController::class, 'show'])->name('executives.show');

// FAQ routes
Route::get('/faqs', [FaqController::class, 'index'])->name('faqs.index');
Route::get('/faqs/category/{category}', [FaqController::class, 'getByCategory'])->name('faqs.by-category');
Route::get('/faqs/search', [FaqController::class, 'search'])->name('faqs.search');


//view register form for those with registration number
Route::get('/show/search', function () {
    return view('public.register.search');
});

Route::post('/register/register', [RegisterController::class, 'searchRegister'])->name('searchRegister');
Route::post('/save/register', [RegisterController::class, 'saveRegister'])->name('saveRegister');


//view submit data form for those without registration number
Route::get('/submit-data/submit', [RegisterController::class, 'showSubmitData'])->name('showSubmitData');
Route::post('/submit/data', [RegisterController::class, 'submitData'])->name('submitData');
Route::get('/login-submit-data', function () {
    return view('public.submit-data.login');
});
// Route::get('/', [LoginController::class, 'showLogin'])->name('showLogin');
// Route::get('/login', [LoginController::class, 'showLogin'])->name('showLogin');
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/dashboard', [LoginController::class, 'showDashboard'])->name('showDashboard');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');



Route::get('/verify-idcard/{id}', [IDCardController::class, 'verifyIDCard'])->name('verifyIDCard');
//login as alumni mmebclass

Route::group(['prefix' => 'error'], function () {
    Route::get('404', function () {
        return view('pages.error.404');
    });
    Route::get('500', function () {
        return view('pages.error.500');
    });
});

Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

// 404 for undefined routes
Route::any('/{page?}', function () {
    return View::make('pages.error.404');
})->where('page', '.*');
