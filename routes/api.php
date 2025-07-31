<?php

use Illuminate\Http\Request;
use App\Http\Middleware\ApiKeyMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\WishlistController;


Route::get('/email/verify/{id}/{hash}', [AuthController::class, 'verifyEmail'])
->middleware(['signed', 'throttle:6,1'])
->name('verification.verify');

Route::get('/policy', [PolicyController::class, 'policy']);
Route::get('/terms', [PolicyController::class, 'terms']);

Route::get('/contact', [ContactController::class, 'showContactPage']);

Route::get('/blogs', [BlogController::class, 'blogs']);
Route::get('/blogs/{slug}', [BlogController::class, 'show']);

Route::get('/tours', [TourController::class, 'getTours']);
Route::get('/tours/{slug}', [TourController::class, 'getTour']);

Route::get('/faqs', [FAQController::class, 'getFaq']);

Route::get('/about', [AboutController::class, 'getAboutUs']);

Route::middleware(ApiKeyMiddleware::class)->group(function () {
    Route::post('/login', [AuthController::class, 'login']); //
    Route::post('/register', [AuthController::class, 'register']); //

    Route::post('/contact/message', [ContactController::class, 'storeContactMessage']);

    Route::post('/forgotpwd', [AuthController::class, 'sendResetLinkEmail']); //
    Route::post('/resetpwd/validatecredentials', [AuthController::class, 'rp_validateCreds']); //
    Route::post('/resetpwd/newpwd', [AuthController::class, 'set_newpass']); //

    Route::post('/email/resend', [AuthController::class, 'resendVerificationEmail'])
    ->middleware(['auth:sanctum', 'throttle:6,1'])
    ->name('verification.resend');

    Route::get('/user', function (Request $request) {
            return $request->user();
        })->middleware('auth:sanctum');
    

   
    
    Route::middleware(['auth:sanctum', 'verified'])->group(function () {  
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::get('/check-token', [AuthController::class, 'checkToken']);

        Route::post('/toggle/wishlist', [WishlistController::class, 'toggleWishlist']);
        Route::get('/wishlist', [WishlistController::class, 'getWishlist']);
     });
});


