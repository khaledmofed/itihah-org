<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AwardsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfessionDayController;
use App\Http\Controllers\SupporterController;
use App\Http\Middleware\AdminAuth;
use Illuminate\Support\Facades\Route;

// ==================== Frontend Routes ====================
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/about/{section}', [AboutController::class, 'section'])->name('about.section');
Route::get('/education', [EducationController::class, 'index'])->name('education');
Route::get('/education/{category}', [EducationController::class, 'category'])->name('education.category');
Route::get('/awards', [AwardsController::class, 'index'])->name('awards');
Route::get('/awards/{slug}', [AwardsController::class, 'show'])->name('awards.show');
Route::get('/profession-day', [ProfessionDayController::class, 'index'])->name('profession-day');
Route::get('/events', [EventsController::class, 'index'])->name('events');
Route::get('/events/{slug}', [EventsController::class, 'show'])->name('events.show');
Route::get('/supporter', [SupporterController::class, 'index'])->name('supporter');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');
Route::get('/join', [ContactController::class, 'join'])->name('join');
Route::post('/join', [ContactController::class, 'joinSubmit'])->name('join.submit');
Route::get('/news', [NewsController::class, 'index'])->name('news');
Route::get('/news/{slug}', [NewsController::class, 'show'])->name('news.show');
Route::post('/appointment', [AppointmentController::class, 'submit'])->name('appointment.submit');

// ==================== Admin Routes ====================
Route::prefix('admin')->name('admin.')->group(function () {
    // Auth
    Route::get('/login', [Admin\AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [Admin\AuthController::class, 'login'])->name('login.post');
    Route::post('/logout', [Admin\AuthController::class, 'logout'])->name('logout');

    // Protected admin routes
    Route::middleware(AdminAuth::class)->group(function () {
        Route::get('/', [Admin\DashboardController::class, 'index'])->name('dashboard');

        Route::get('/settings', [Admin\SettingsController::class, 'index'])->name('settings');
        Route::post('/settings', [Admin\SettingsController::class, 'update'])->name('settings.update');

        Route::resource('sliders', Admin\SliderController::class);
        Route::resource('about', Admin\AboutController::class);
        Route::resource('education', Admin\EducationController::class);
        Route::resource('awards', Admin\AwardController::class);
        Route::resource('profession-day', Admin\ProfessionDayController::class);
        Route::resource('events', Admin\EventController::class);
        Route::resource('supporters', Admin\SupporterController::class);
        Route::resource('statistics', Admin\StatisticController::class);
        Route::resource('news', Admin\NewsController::class);
        Route::resource('testimonials', Admin\TestimonialController::class);
        Route::resource('appointment-requests', Admin\AppointmentRequestController::class)->only(['index', 'show', 'destroy']);
        Route::resource('membership-requests', Admin\MembershipRequestController::class)->only(['index', 'show', 'update', 'destroy']);
        Route::resource('users', Admin\UserController::class);

        Route::get('/media', [Admin\MediaController::class, 'index'])->name('media.index');
        Route::post('/media/upload', [Admin\MediaController::class, 'upload'])->name('media.upload');
        Route::delete('/media/{id}', [Admin\MediaController::class, 'destroy'])->name('media.destroy');

        Route::get('/pages', [Admin\PageController::class, 'index'])->name('pages.index');
        Route::get('/pages/{page}', [Admin\PageController::class, 'edit'])->name('pages.edit');
        Route::post('/pages/{page}', [Admin\PageController::class, 'update'])->name('pages.update');
    });
});
