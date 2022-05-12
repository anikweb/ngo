<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    aboutSettings,
    AdvisorController,
    BackendController,
    ContactAndBasicInfoController,
    FrontendController,
    GeneralSettingController,
    OffcialTeamController,
    RoleController,
    SliderController,
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
Route::get('/about', [FrontendController::class,'aboutIndex'])->name('about');
Route::get('/team/adviser', [FrontendController::class,'advisorTeamIndex'])->name('frontend.team.advisor.index');
Route::get('/team/official', [FrontendController::class,'officialTeamIndex'])->name('frontend.team.official.index');
// Backend
Route::get('/dashboard', [BackendController::class,'dashboard'])->name('dashboard')->middleware(['auth','verified']);
Route::resource('dashboard/generalSetting', GeneralSettingController::class)->middleware(['auth','verified']);
Route::get('/dashboard/assign/user', [RoleController::class,'roleAssignUsers'])->name('role.assign.users')->middleware(['auth','verified']);
Route::post('/dashboard/assign/user/post', [RoleController::class,'roleAssignUsersPost'])->name('role.assign.users.post')->middleware(['auth','verified']);
Route::resource('dashboard/role', RoleController::class)->middleware(['auth','verified']);

Route::get('/dashboard/assign/user', [RoleController::class,'roleAssignUsers'])->name('role.assign.users')->middleware(['auth','verified']);

Route::get('dashboard/get/social/url/{platform_url}', [ContactAndBasicInfoController::class, 'getSocialUrl'])->middleware(['auth','verified']);

Route::resource('dashboard/contact_and_basic_info', ContactAndBasicInfoController::class)->middleware(['auth','verified']);

Route::resource('dashboard/about-settings', aboutSettings::class)->middleware(['auth','verified']);
Route::get('dashboard/advisor/social/delete/{advisor_id}',[AdvisorController::class,'deleteAdvisorSocial'])->middleware(['auth','verified']);
Route::post('dashboard/advisor/change-priority',[AdvisorController::class,'changePriority'])->name('advisor.change.priority')->middleware(['auth','verified']);
Route::resource('dashboard/advisors-settings', AdvisorController::class)->middleware(['auth','verified']);
Route::get('dashboard/official/team/social/delete/{official_team_id}',[OffcialTeamController::class,'deleteOfficialTeam'])->middleware(['auth','verified']);
Route::post('dashboard/official/team/change-priority',[OffcialTeamController::class,'changePriority'])->name('official.team.change.priority')->middleware(['auth','verified']);
Route::resource('dashboard/official-team', OffcialTeamController::class)->middleware(['auth','verified']);
Route::post('dashboard/slider/change-priority',[SliderController::class,'changePriority'])->name('slider.change.priority')->middleware(['auth','verified']);
Route::resource('dashboard/sliders',SliderController::class)->middleware(['auth','verified']);

require __DIR__.'/auth.php';
