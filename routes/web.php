<?php


use Telegram\Bot\Laravel\Facades\Telegram;
use App\Http\Controllers\TelegramBotController as TelegramController;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/* Route::get('/', function () {
	
    return view('layouts/digcomp-layout');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); */

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\ChangePassword;            
use App\Http\Controllers\TelegramBotController;         
use App\Http\Controllers\TesterController;
use App\Http\Controllers\PdferController as PDF; 
use App\Http\Controllers\adminController as Admin;   
use App\Http\Controllers\InstitucionController;     

/* Route::post('/webhook', function () {
	    $updates = Telegram::getWebhookUpdate();
		Storage::put('comiinnngggg.txt', $updates);
		return 'ok';
	}); */
Route::post('/webhook', [TelegramController::class, 'webhook'])->name('webhook');

Route::get('/pdfer', [PDF::class, 'make_pdf'])->name('pdfer');

Route::get('/admin', [Admin::class, 'build_admin_gui'])->name('admin')->middleware('auth');

Route::post('/push-institucion', [InstitucionController::class, 'set_new_institucion'])->name('set_inst')->middleware('auth');

Route::get('/digcomp_bot', function () {
	return redirect()->away('https://t.me/digcomp_bot');
})->name('bot');


Route::get('/', function () {return redirect('/dashboard');})->middleware('auth');
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

//Route::post('/webhook', 'TelegramBotController@webhook');
/* Route::get('/webhook', function () {
	echo 'hola';
}); */
