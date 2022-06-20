<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    aboutSettings,
    AdvisorController,
    BackendController,
    EventsController,
    ContactAndBasicInfoController,
    FrontendController,
    GeneralSettingController,
    ImageGalleryController,
    OffcialTeamController,
    ProjectController,
    PublicationsController,
    RoleController,
    SliderController,
    VolunteerApplyController,
};
use App\Models\Publications;

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
Route::get('/about', [FrontendController::class,'aboutIndex'])->name('frontend.about');
Route::get('/team/adviser', [FrontendController::class,'advisorTeamIndex'])->name('frontend.team.advisor.index');
Route::get('/team/official', [FrontendController::class,'officialTeamIndex'])->name('frontend.team.official.index');
Route::get('/project/{slug}', [FrontendController::class,'projectIndex'])->name('frontend.project.index');
Route::get('/events', [FrontendController::class,'eventsIndex'])->name('frontend.events.index');
Route::get('/events/{slug}', [FrontendController::class,'eventsShow'])->name('frontend.events.show');
Route::get('/media/image-gallery', [FrontendController::class,'imagegalleryIndex'])->name('frontend.image.gallery');
Route::get('/media/publications', [FrontendController::class,'publicationsIndex'])->name('frontend.publications.index');
Route::get('/volunteer/apply',[VolunteerApplyController::class,'create'])->name('frontend.volunteer.apply');
Route::post('volunteer/apply/store',[VolunteerApplyController::class,'store'])->name('frontend.volunteer.store');
Route::get('/get/ajax/present/district/info/{division_id}',[VolunteerApplyController::class,'getDistrict']);
Route::get('/get/ajax/present/thana/info/{district_id}',[VolunteerApplyController::class,'getThana']);
Route::get('/get/ajax/permanent/district/info/{division_id}',[VolunteerApplyController::class,'getPmDistrict']);
Route::get('/get/ajax/permanent/thana/info/{district_id}',[VolunteerApplyController::class,'getPmThana']);
Route::get('/get/ajax/captcha/reload/',[VolunteerApplyController::class,'reloadCaptcha']);

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
Route::get('dashboard/project/{slug}/multiple-image/add',[ProjectController::class,'multipleImageCreate'])->name('projects.multiple.image.create');
Route::post('dashboard/project/multiple-image/update',[ProjectController::class,'multipleImageUpdate'])->name('projects.multiple.image.update');
Route::post('dashboard/project/multiple-image/delete',[ProjectController::class,'multipleImageDelete'])->name('projects.multiple.image.delete');
Route::resource('dashboard/projects', ProjectController::class)->middleware(['auth','verified']);
Route::resource('dashboard/events',EventsController::class)->middleware(['auth','verified']);
Route::get('dashboard/get/image/{id}',[ImageGalleryController::class,'getImage'])->middleware(['auth','verified']);
Route::post('dashboard/image-gallery/update/custom',[ImageGalleryController::class,'updateImage'])->name('image-gallery.update.custom')->middleware(['auth','verified']);
Route::get('dashboard/image-gallery/trash/{id}',[ImageGalleryController::class,'updateTrash'])->name('image-gallery.trash')->middleware(['auth','verified']);
Route::get('dashboard/image-gallery/delete/permanently/{id}',[ImageGalleryController::class,'updateDeletePermanently'])->name('image-gallery.trash')->middleware(['auth','verified']);
Route::resource('dashboard/image-gallery',ImageGalleryController::class)->middleware(['auth','verified']);
Route::resource('dashboard/publications',PublicationsController::class)->middleware(['auth','verified']);
require __DIR__.'/auth.php';
