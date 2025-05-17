<?php

use App\Http\Controllers\Admin_userController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminSupportController;
use App\Http\Controllers\Current_dataController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SupportController;

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
Route::get('/', [Current_dataController::class, 'index'])->middleware('auth')->name('dashboard');


Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register')->middleware('guest');
Route::post('register', [AuthController::class, 'register'])->middleware('guest');

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('login', [AuthController::class, 'login'])->middleware('guest');

Route::post('logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');
Route::get('/report', [ReportController::class, 'showForm'])->name('report.form')->middleware('auth');
Route::get('/report/export', [ReportController::class, 'export'])->name('report.export')->middleware('auth');

Route::get('/admin',[AdminController::class, 'index'])->name('admin')->middleware('can:admin','auth');
Route::get('/admin/users',[Admin_userController::class, 'show'])->name('admin.user')->middleware('can:admin','auth');
Route::get('/admin/supports',[AdminSupportController::class, 'show'])->name('admin.support')->middleware('can:admin','auth');
Route::get('/admin/support/{support_request}/edit',[AdminSupportController::class,'edit'])->name('admin.support.edit')->middleware('can:admin','auth');
Route::put('/admin/support/{support_request}',[AdminSupportController::class, 'update'])->name('admin.support.update')->middleware('can:admin','auth');


Route::delete('admin/user/{user}',[Admin_userController::class,'delete'])->name('users.destroy')->middleware('can:admin','auth');;
Route::get('/support-form',[SupportController::class, 'supportForm'])->middleware('auth');
Route::post('/support/submit',[SupportController::class,'store'])->middleware('auth')->name('support.store');
Route::get('/supports',[SupportController::class, 'show'])->middleware('auth')->name('support.show');
Route::get('/supports/{support_request}/edit',[SupportController::class, 'edit'])->middleware('auth')->name('support.edit');
Route::post('/supports/{support_request}',[SupportController::class,'update'])->middleware('auth')->name('support.update');
Route::delete('/supports/{support_request}',[SupportController::class,'destroy'])->name('support.destroy')->middleware('auth');;



Route::get('/terms_of_service',function(){
    return view('terms_of_service');
});
Route::get('/privacy_policy',function(){
    return view('privacy_policy');
});

Route::get('/password/reset', [AuthController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/password/email', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');

Route::get('/password/reset/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
Route::post('/password/reset', [AuthController::class, 'reset'])->name('password.update');

