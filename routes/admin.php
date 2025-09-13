<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AlumniController;
use App\Http\Controllers\Admin\ApplicantController;
use App\Http\Controllers\Admin\ChapterController;
use App\Http\Controllers\Admin\ExecutiveController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\ScholarshipController as AdminScholarshipController;
use App\Http\Controllers\Admin\ContactMessageController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\JobsController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\UnitController;
use App\Http\Controllers\ScholarshipController;




//login
// $user = Auth::user();

// Route::get('/', function () {
//     return redirect()->route('admin.showLogin');
// });
Route::get('/', function () {
    return redirect()->route('admin.showLogin');
});

Route::get('/test', function () {
    return view('admin.applicant.test');
});
Route::get('/', [LoginController::class, 'showLogin'])->name('showLogin');
Route::get('/login', [LoginController::class, 'showLogin'])->name('showLogin');
Route::post('/login', [LoginController::class, 'login'])->name('login');


Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->name('showDashboard');
Route::get('/change-password', [LoginController::class, 'showChangePassword'])->name('showChangePassword');
Route::post('/change-password', [LoginController::class, 'saveChangePassword'])->name('saveChangePassword');
Route::post('/reset-password', [LoginController::class, 'resetPassword'])->name('resetPassword');

// admin
Route::get('/admins', [AdminController::class, 'showAdmins'])->name('showAdmins');
Route::post('/save-admins', [AdminController::class, 'saveAdmin'])->name('saveAdmin');
Route::post('/admin-edit', [AdminController::class, 'editAdmin'])->name('editAdmin');
Route::post('/save-admin-edit', [AdminController::class, 'saveEditAdmin'])->name('saveEditAdmin');


//upload alumni
Route::get('/show-upload', [AlumniController::class, 'showAluminUpload'])->name('showAluminUpload');
Route::post('/upload-alumni', [AlumniController::class, 'uploadAlumni'])->name('uploadAlumni');
Route::get('show-upload-single', [AlumniController::class, 'showSingleUpload'])->name('showSingleUpload');
Route::post('/upload-alumni-single', [AlumniController::class, 'uploadAlumniSingle'])->name('uploadAlumniSingle');

//list
Route::get('/show-list', [AlumniController::class, 'showList'])->name('showList');
Route::post('/get-list', [AlumniController::class, 'getAlumni'])->name('getAlumni');

// Admin FAQ Management
Route::prefix('faqs')->name('faqs.')->group(function () {
    Route::get('/', [FaqController::class, 'index'])->name('index');
    Route::get('/create', [FaqController::class, 'create'])->name('create');
    Route::post('/', [FaqController::class, 'store'])->name('store');
    Route::get('/{faq}', [FaqController::class, 'show'])->name('show');
    Route::get('/{faq}/edit', [FaqController::class, 'edit'])->name('edit');
    Route::put('/{faq}', [FaqController::class, 'update'])->name('update');
    Route::delete('/{faq}', [FaqController::class, 'destroy'])->name('destroy');
    Route::patch('/{faq}/toggle-status', [FaqController::class, 'toggleStatus'])->name('toggle-status');
});

// Admin Contact Messages Management
Route::prefix('messages')->name('messages.')->group(function () {
    Route::get('/', [ContactMessageController::class, 'index'])->name('index');
    Route::get('/data', [ContactMessageController::class, 'getData'])->name('data');
    Route::get('/{id}', [ContactMessageController::class, 'show'])->name('show');
    Route::patch('/{id}/status', [ContactMessageController::class, 'updateStatus'])->name('update-status');
    Route::delete('/{id}', [ContactMessageController::class, 'destroy'])->name('destroy');
    Route::post('/bulk-action', [ContactMessageController::class, 'bulkAction'])->name('bulk-action');
});

///report
//id card
Route::get('/show-IDCard', [ReportController::class, 'showIDList'])->name('showIDList');
Route::post('/generate-IDCard-List', [ReportController::class, 'generateIDList'])->name('generateIDList');
Route::get('/verify-idcard/{id}', [ReportController::class, 'verifyIDCard'])->name('verifyIDCard');


// // Faculties
// Route::get('/show-faculty', [UnitController::class, 'showFaculty'])->name('showFaculty');
// Route::get('/faculty/list/', [UnitController::class, 'getFacultyList'])->name('getFacultyList');
// Route::post('faculty/save', [UnitController::class, 'saveFaculty'])->name('saveFaculty');
// Route::get('faculty-edit{id}', [UnitController::class, 'getFacultyEdit'])->name('getFacultyEdit');

// ///Departments
// Route::get('/show-department', [UnitController::class, 'showDepartment'])->name('showDepartment');
// Route::get('/department/list/', [UnitController::class, 'getDepartmentList'])->name('getDepartmentList');
// Route::post('department/save', [UnitController::class, 'saveDepartment'])->name('saveDepartment');
Route::get('department-edit{id}', [UnitController::class, 'getDepartmentEdit'])->name('getDepartmentEdit');
// Route::get('/show-batch-departments', [UnitController::class, 'showBatchDepartments'])->name('showBatchDepartments');
// Route::post('batch-department/save', [UnitController::class, 'saveBatchDepartment'])->name('saveBatchDepartment');


// ///Programmes
Route::get('/show-programme', [UnitController::class, 'showProgramme'])->name('showProgramme');
Route::get('/programme/list/', [UnitController::class, 'getProgrammeList'])->name('getProgrammeList');
Route::post('programme/save', [UnitController::class, 'saveProgramme'])->name('saveProgramme');
Route::get('programme-edit{id}', [UnitController::class, 'getProgrammeEdit'])->name('getProgrammeEdit');
Route::get('/show-batch-programmes', [UnitController::class, 'showBatchProgrammes'])->name('showBatchProgrammes');
Route::post('batch-programme/save', [UnitController::class, 'saveBatchProgramme'])->name('saveBatchProgramme');

// //Applicant
// Route::get('/show-applicants', [ApplicantController::class, 'showApplicantList'])->name('showApplicantList');
// Route::get('/get-applicants', [ApplicantController::class, 'getApplicantsList'])->name('getApplicantsList');
// Route::get('/show-applicant/edit/{id}', [ApplicantController::class, 'showApplicantEdit'])->name('showApplicantEdit');
// Route::post('/save-edit-applicant', [ApplicantController::class, 'saveEditApplicant'])->name('saveEditApplicant');

// //News and Events
// Route::get('/show-events', [EventController::class, 'showEvents'])->name('showEvents');
// Route::post('/save-events', [EventController::class, 'saveEvents'])->name('saveEvents');


// //jobs
// Route::get('/show-jobs', [JobsController::class, 'showJobs'])->name('showJobs');
// Route::post('/save-jobs', [JobsController::class, 'saveJob'])->name('saveJob');

// // Executives Management
// Route::resource('executives', ExecutiveController::class);
// Route::get('/executives/data/list', [ExecutiveController::class, 'getExecutives'])->name('executives.data');
// Route::post('/executives/{executive}/toggle-status', [ExecutiveController::class, 'toggleStatus'])->name('executives.toggle-status');
// Route::delete('/executives/{executive}', [ExecutiveController::class, 'destroy'])->name('executives.destroy');




// //scholarships - Admin CRUD Management
// Route::prefix('scholarships')->name('scholarships.')->group(function () {
//     Route::get('/', [AdminScholarshipController::class, 'index'])->name('index');
//     Route::get('/create', [AdminScholarshipController::class, 'create'])->name('create');
//     Route::post('/', [AdminScholarshipController::class, 'store'])->name('store');
//     Route::get('/{id}', [AdminScholarshipController::class, 'show'])->name('show');
//     Route::get('/{id}/edit', [AdminScholarshipController::class, 'edit'])->name('edit');
//     Route::put('/{id}', [AdminScholarshipController::class, 'update'])->name('update');
//     Route::delete('/{id}', [AdminScholarshipController::class, 'destroy'])->name('destroy');
//     Route::get('/data/list', [AdminScholarshipController::class, 'getData'])->name('data');
// });



//
// Member
// Route::get('member-list', [MemberController::class, 'showMembers'])->name('showMembers');
// Route::post('/members/list/', [MemberController::class, 'getMemberList'])->name('getMemberList');
// Route::get('member-edit{id}', [MemberController::class, 'getMemberEdit'])->name('getMemberEdit');
// Route::post('/members/save', [MemberController::class, 'saveMember'])->name('saveMember');

// chapter

// Route::get('/chapter-admins', [ChapterController::class, 'showAdmins'])->name('showAdmins');
// Route::post('/chapter-save-admins', [ChapterController::class, 'saveAdmin'])->name('saveAdmin');
// Route::post('/chapter-admin-edit', [ChapterController::class, 'editAdmin'])->name('editAdmin');
// Route::post('/chapter-save-admin-edit', [ChapterController::class, 'saveEditAdmin'])->name('saveEditAdmin');

// // settings
// Route::get('batch-entry', [AlumniController::class, 'showBatchEntry'])->name('showBatchEntry');
// Route::post('batch-save', [AlumniController::class, 'saveBatchEntry'])->name('saveBatchEntry');
// Route::post('batch-list', [AlumniController::class, 'getBatchList'])->name('getBatchList');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
// Route::get('/b', function () {
//     return view('admin.b');
// });
