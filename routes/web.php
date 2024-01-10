<?php
use App\Http\Controllers\admin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\MemberReminderController;

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
    return view('email.MemberEmailNotificationsTemplate');
});

// ADMIN DASHBOARD
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::resource('/members', AdminController::class,['names' => 'member']);
    Route::get('notifications', [MemberReminderController::class,'index'])->name('notifications');
    Route::put('notifications/update', [MemberReminderController::class,'setSetting'])->name('notifications.update');
});

// MEMBER DASHBOARD
Route::prefix('member')->name('member.')->group(function () {
    Route::get('/dashboard', [AdminController::class,'index'])->name('admin-dashboard');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
