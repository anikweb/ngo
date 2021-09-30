<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    BackendController,
    ContactAndBasicInfoController,
    FrontendController,
    GeneralSettingController,
    RoleController,
};

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

// Frontend

Route::get('/', [FrontendController::class,'frontend'])->name('frontend');
// Backend
Route::get('/dashboard', [BackendController::class,'dashboard'])->name('dashboard')->middleware('auth');
Route::resource('dashboard/generalSetting', GeneralSettingController::class)->middleware('auth');
Route::get('/dashboard/assign/user', [RoleController::class,'roleAssignUsers'])->name('role.assign.users')->middleware('auth');
Route::post('/dashboard/assign/user/post', [RoleController::class,'roleAssignUsersPost'])->name('role.assign.users.post')->middleware('auth');
Route::resource('dashboard/role', RoleController::class)->middleware('auth');

Route::get('/dashboard/assign/user', [RoleController::class,'roleAssignUsers'])->name('role.assign.users')->middleware('auth');

Route::get('dashboard/get/social/url/{platform_url}', [ContactAndBasicInfoController::class, 'getSocialUrl']);

Route::resource('dashboard/contact_and_basic_info', ContactAndBasicInfoController::class)->middleware('auth');

require __DIR__.'/auth.php';
