<?php

use Illuminate\Support\Facades\Route;

//the welcome route for the application...
Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'welcome']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\ChangePassword; 
use App\Http\Controller\MortgageController;  
use App\Http\Controller\ServicesController;           
 
Route::get('/caculateMortgage', [App\Http\Controllers\MortgageController::class, 'showMortgageScreen']);       
Route::get('/introSection', [App\Http\Controllers\IntroController::class, 'index']);  
Route::get('/storySection', [App\Http\Controllers\StoryController::class, 'index']);       
Route::get('/pricingSection', [App\Http\Controllers\PricingController::class, 'index']);  
Route::get('/servicesScreen', [App\Http\Controllers\ServicesController::class, 'index']);
Route::get('/editService/{id}',[App\Http\Controllers\ServicesController::class, 'editService']);
Route::get('/price/{id}',[App\Http\Controllers\PricingController::class, 'editPrice']);
Route::put('/updateService/{id}',[App\Http\Controllers\ServicesController::class, 'updateService']);   
Route::put('/updatePrice/{id}',[App\Http\Controllers\PricingController::class, 'setNewPrice']);
Route::delete('/deletePrice/{id}',[App\Http\Controllers\PricingController::class, 'deletePrice']);   
Route::post('/uploadIntroContent', [App\Http\Controllers\IntroController::class, 'store']); 
Route::post('/uploadStoryContent', [App\Http\Controllers\StoryController::class, 'store']);    
//Route::get('/', function () {return redirect('/dashboard');})->middleware('auth');
	Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
	Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->name('register.perform');
	Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
	Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');
	Route::get('/reset-password', [ResetPassword::class, 'show'])->middleware('guest')->name('reset-password');
	Route::post('/reset-password', [ResetPassword::class, 'send'])->middleware('guest')->name('reset.perform');
	Route::get('/change-password', [ChangePassword::class, 'show'])->middleware('guest')->name('change-password');
	Route::post('/change-password', [ChangePassword::class, 'update'])->middleware('guest')->name('change.perform');
	Route::get('/dashboard', [HomeController::class, 'index'])->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	Route::get('/virtual-reality', [PageController::class, 'vr'])->name('virtual-reality');
	Route::get('/rtl', [PageController::class, 'rtl'])->name('rtl');
	Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
	Route::post('/profile', [UserProfileController::class, 'update'])->name('profile.update');
	Route::get('/profile-static', [PageController::class, 'profile'])->name('profile-static'); 
	Route::get('/sign-in-static', [PageController::class, 'signin'])->name('sign-in-static');
	Route::get('/sign-up-static', [PageController::class, 'signup'])->name('sign-up-static'); 
	Route::get('/{page}', [PageController::class, 'index'])->name('page');
	Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});
