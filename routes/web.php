<?php

use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\BookingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\SliderController;
use App\Http\Controllers\admin\EventController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\InquiryController;
use App\Http\Controllers\user\AboutController;
use App\Http\Controllers\user\BookingsController;
use App\Http\Controllers\user\ContactController;
use App\Http\Controllers\user\EventController as UserEventController;
use App\Http\Controllers\user\HomeController;

Route::prefix('admin')->group(function () {
Route::get('login',[AuthController::class,'login'])->name('login');
Route::post('login-post',[AuthController::class,'loginPost'])->name('login.post');

Route::middleware(['auth:admin'])->group(function () {
Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');

Route::get('home-slider',[SliderController::class,'index'])->name('home.slider');
Route::post('home-slider/store',[SliderController::class,'store'])->name('slider.store');
Route::DELETE('home-slider/{id}',[SliderController::class,'destroy'])->name('slider.delete');
Route::get('home-slider/edit/{id}',[SliderController::class,'edit'])->name('slider.edit');
Route::post('home-slider/update/{id}',[SliderController::class,'update'])->name('slider.update');

Route::get('categories',[CategoryController::class,'index'])->name('categories');
Route::post('categoriese/store',[CategoryController::class,'store'])->name('categories.store');
Route::DELETE('categories/{id}',[CategoryController::class,'destroy'])->name('categories.delete');
Route::get('categories/edit/{id}',[CategoryController::class,'edit'])->name('categories.edit');
Route::post('categories/update/{id}',[CategoryController::class,'update'])->name('categories.update');

Route::get('events',[EventController::class,'index'])->name('events');
Route::post('events/store',[EventController::class,'store'])->name('events.store');
Route::delete('events/{id}/remove-image', [EventController::class, 'removeImage'])->name('events.removeImage');
Route::DELETE('events/{id}',[EventController::class,'destroy'])->name('events.delete');
Route::get('events/edit/{id}',[EventController::class,'edit'])->name('events.edit');
Route::post('events/update/{id}',[EventController::class,'update'])->name('events.update');

Route::get('booking',[BookingController::class,'index'])->name('booking');
Route::post('booking/store',[BookingController::class,'store'])->name('booking.store');
Route::DELETE('booking/{id}',[BookingController::class,'destroy'])->name('booking.delete');
Route::get('booking/edit/{id}',[BookingController::class,'edit'])->name('booking.edit');
Route::post('booking/update/{id}',[BookingController::class,'update'])->name('booking.update');

Route::get('inquiry',[InquiryController::class,'index'])->name('inquiries');
Route::get('inquiry/show/{id}',[InquiryController::class,'show'])->name('inquiries.show');

Route::get('logout',[AuthController::class,'logout'])->name('logout');
    });
});



// ----------------USER SIDE

Route::get('/',[HomeController::class,'home'])->name('home');
Route::get('/about-us',[AboutController::class,'about'])->name('about');
Route::get('/event/{slug}',[UserEventController::class,'list'])->name('event.list');
Route::get('/event-detail/{slug}',[UserEventController::class,'show'])->name('event.detail');
Route::match(['get', 'post'], '/event-booking-form/{slug}',[BookingsController::class,'form'])->name('event.booking');

Route::post('/event-bookingPost/{id}', [BookingsController::class, 'store'])->name('event.booking.store');
Route::get('/ticket/{booking}', [BookingsController::class, 'showTicket'])->name('ticket.show');

Route::get('/contact-us',[ContactController::class,'contact'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');









