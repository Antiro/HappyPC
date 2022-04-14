<?php

use App\Http\Controllers\Admin\LoginAdminController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImagesOfServicesController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\StatisticController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;


//Home
Route::get('/', [HomeController::class, 'home'])->name('home');

//NAV+
Route::get('/about', [AboutUsController::class, 'index'])->name('about');
Route::get('/contacts', [ContactController::class, 'index'])->name('contacts');
Route::get('/delivery', [DeliveryController::class, 'index'])->name('delivery');

//Register
Route::get('/register', [RegisterController::class, 'register'])->name('register.index');
Route::post('/register', [RegisterController::class, 'registerStore'])->name('register.store');

//Login
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'loginCheck'])->name('login.check');

//Service
Route::resource('services', ServiceController::class);

Route::resource('applications', ApplicationController::class);

//Workers
Route::resource('team', WorkerController::class);

//User
Route::middleware('auth')->group(function () {

    //Profile
    Route::get('/profile', [LoginController::class, 'profile'])->name('profile');
    //Logout
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    //NewApplication
    Route::post('/newApplication', [ApplicationController::class, 'registerApplication'])->name('application.store');
    //NewReview
    Route::post('/newReview', [ReviewController::class, 'registerReview'])->name('review.store');
    //User
    Route::resource('user', UserController::class);

});

//Admin
Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/', [LoginAdminController::class, 'loginAdmin'])->name('login');
    Route::post('/', [LoginAdminController::class, 'loginAdminCheck'])->name('login.check');

    Route::middleware('can:general')->group(function () {

        //Logout
        Route::get('/logout', [LoginAdminController::class, 'logoutAdmin'])->name('logout');

        Route::get('/dashboard', [LoginAdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/logout', [LoginAdminController::class, 'logoutAdmin'])->name('logout');
        Route::get('/reviews', [ReviewController::class, 'adminView'])->name('ReviewsAdminView');
        Route::get('/statistics', [StatisticController::class, 'adminView'])->name('StatisticsAdminView');
    });


    Route::middleware('can:admin')->group(function () {

        //View tables
        Route::get('/services', [ServiceController::class, 'adminView'])->name('servicesAdminView');
        Route::resource('imagesOfServices', ImagesOfServicesController::class);
        Route::get('/applications', [ApplicationController::class, 'adminView'])->name('ApplicationsAdminView');
        Route::get('/aboutUs', [AboutUsController::class, 'adminView'])->name('AboutUsAdminView');
        Route::get('/contacts', [ContactController::class, 'adminView'])->name('ContactsAdminView');
        Route::get('/sponsors', [SponsorController::class, 'adminView'])->name('SponsorsAdminView');
        Route::get('/users', [UserController::class, 'adminView'])->name('UsersAdminView');
        Route::get('/workers', [WorkerController::class, 'adminView'])->name('WorkersAdminView');
        Route::get('/delivery', [DeliveryController::class, 'adminView'])->name('DeliveryAdminView');
    });
});
