<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\SpeakerController;
use App\Http\Controllers\BookingController;

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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('/');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function()
{
    Route::resource('events', EventController::class);
    Route::resource('partners', PartnerController::class);
    Route::resource('sponsors', SponsorController::class);
    Route::resource('tickets', TicketController::class);
    Route::resource('speakers', SpeakerController::class);
    Route::resource('bookings', BookingController::class);   

    Route::get('products', [TicketController::class, 'indexProduct'])->name('products');
    Route::get('cart', [TicketController::class, 'cart']);
    Route::get('/add-to-cart/{id}', [TicketController::class, 'addToCart']); //adaug in cos
    Route::patch('/update-cart', [TicketController::class, 'updateCos']); //modific cos
    Route::delete('/remove-from-cart', [TicketController::class, 'remove']); //sterg din cos 
});

