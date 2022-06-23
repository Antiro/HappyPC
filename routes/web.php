<?php

use App\Http\Controllers\Admin\LoginAdminController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImagesOfServicesController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ServiceApplicationsController;
use App\Http\Controllers\SponsorController;
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
Route::controller(ServiceController::class)->group(function () {

    Route::get('/services', 'index')->name('services.index');
    Route::get('/services/show/{product}', 'show')->name('service.show');
    Route::get('/category/services', 'getServicesByCategoryForm')->name('category.services.form');

});

//Review
Route::resource('review', ReviewController::class);

Route::resource('workers', WorkerController::class);

Route::resource('applications', ApplicationController::class);

//Workers
Route::resource('team', WorkerController::class);

//User
Route::middleware('auth')->group(function () {

    //Profile
    Route::get('/profile', [LoginController::class, 'profile'])->name('profile');
    Route::get('/profile/applications', [LoginController::class, 'applications'])->name('profileApplications');
    Route::get('/profile/reviews', [LoginController::class, 'reviews'])->name('profileReviews');

    //Logout
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    //User
    Route::resource('user', UserController::class);

    //Basket
    Route::controller(BasketController::class)->group(function () {

        Route::get('/basket', 'basket')->name('basket');
        Route::post('/basket/plus', 'basketPlus')->name('basket.plus');
        Route::delete('/basket/{basket}', 'basketMinus')->name('basket.minus');

    });

    //Application
    Route::controller(ApplicationController::class)->group(function () {

        Route::post('/application', 'createApplication')->name('application.create');
        Route::delete('/application/{application}', 'NewDestroy')->name('application.NewDestroy');
        Route::get('/application/{application}', 'show')->name('application.show');

    });

});

//Admin
Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/', [LoginAdminController::class, 'loginAdmin'])->name('login');
    Route::post('/', [LoginAdminController::class, 'loginAdminCheck'])->name('login.check');

    Route::middleware('can:general')->group(function () {

        //Logout
//        Route::get('/logout', [LoginAdminController::class, 'logoutAdmin'])->name('logout');
        Route::get('/dashboard', [LoginAdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/logout', [LoginAdminController::class, 'logoutAdmin'])->name('logout');

    });

    Route::middleware('can:admin')->group(function () {

        Route::resource('imagesOfServices', ImagesOfServicesController::class);
        //View tables
        Route::get('/services', [ServiceController::class, 'adminView'])->name('servicesAdminView');

        Route::get('/applications', [ApplicationController::class, 'adminView'])->name('ApplicationsAdminView');

        Route::resource('serviceApplications', ServiceApplicationsController::class);

        Route::get('/workers', [WorkerController::class, 'adminView'])->name('workersAdminView');
        Route::get('/workers/create', [WorkerController::class, 'adminView'])->name('workersStore');


        Route::get('/reviews', [ReviewController::class, 'adminView'])->name('ReviewsAdminView');

        Route::get('/reviews/{review}', [ReviewController::class, 'updateAdmin'])->name('updateReviewAdmin');

        Route::get('/aboutUs', [AboutUsController::class, 'adminView'])->name('AboutUsAdminView');
        Route::get('/sponsors', [SponsorController::class, 'adminView'])->name('SponsorsAdminView');
        Route::get('/users', [UserController::class, 'adminView'])->name('UsersAdminView');

        Route::get('/delivery', [DeliveryController::class, 'adminView'])->name('DeliveryAdminView');

    });
});
