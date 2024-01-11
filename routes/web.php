<?php
use App\Http\Controllers\admin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\MemberReminderController;
use App\Http\Controllers\member\MemberController;

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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/template', function () {
    return view('email.MemberEmailViewTemplate');
});

// ADMIN DASHBOARD
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::resource('/members', AdminController::class,['names' => 'member']);
    Route::get('notifications', [MemberReminderController::class,'index'])->name('notifications');
    Route::put('notifications/update', [MemberReminderController::class,'setSetting'])->name('notifications.update');
});

// MEMBER DASHBOARD
Route::prefix('member')->name('member.')->middleware('auth')->group(function () {
    Route::resource('/notifications', MemberController::class,['names' => 'mail']);
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
