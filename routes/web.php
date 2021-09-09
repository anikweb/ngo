<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    BackendController,
    FrontendController,
    GeneralSettingController,
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

// Route::get('/', function () {
//     return view('frontend.main');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// Frontend

Route::get('/', [FrontendController::class,'frontend'])->name('frontend');
// Backend
Route::get('/dashboard', [BackendController::class,'dashboard'])->name('dashboard')->middleware('auth');
Route::resource('dashboard/generalSetting', GeneralSettingController::class)->middleware('auth');
require __DIR__.'/auth.php';
