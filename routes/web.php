<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\PartenerController;
use App\Http\Controllers\AgendaController;


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

Route::get('/', [HomeController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/events/{id}', [EventController::class, 'show'])->name('events.show');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

Route::get('/cumpara-bilete/{event_name}', [TicketController::class, 'index'])->name('cumpara-bilete');
Route::post('/cumpara-bilet/{ticket_id}', [TicketController::class, 'addToCart'])->name('cumpara-bilet');
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/update-cart', [CartController::class, 'update'])->name('update-cart');
Route::get('/delete-from-cart/{cartItemId}', [CartController::class, 'delete'])->name('delete-from-cart');
Route::post('/empty-cart', [CartController::class, 'emptyCart'])->name('empty-cart');
Route::post('/checkout', [CartController::class, 'checkout'])->name('stripe.checkout');
Route::get('/checkout/success', [CartController::class, 'checkoutSuccess'])->name('checkout.success');
Route::get('/checkout/cancel', [CartController::class, 'checkoutCancel'])->name('checkout.cancel');
//jj
Route::prefix('user/sponsors')->group(function () {
    Route::get('/', [SponsorController::class, 'index'])->name('user.sponsors.index');
    Route::get('/create', [SponsorController::class, 'create'])->name('user.sponsors.create');
    Route::post('/store', [SponsorController::class, 'store'])->name('user.sponsors.store');
    Route::get('/{sponsor}', [SponsorController::class, 'show'])->name('user.sponsors.show');
});
Route::prefix('user/parteners')->group(function () {
    Route::get('/', [PartenerController::class, 'index'])->name('user.parteners.index');
    Route::get('/create', [PartenerController::class, 'create'])->name('user.parteners.create');
    Route::post('/store', [PartenerController::class, 'store'])->name('user.parteners.store');
    Route::get('/{partener}', [PartenerController::class, 'show'])->name('user.parteners.show');
});
Route::post('/agenda/create', [AgendaController::class, 'createAgenda'])->name('admin.agenda.create');

Route::get('/agenda/{event_name}', [AgendaController::class, 'index'])->name('agenda.index');


Route::middleware(['auth', 'role:user'])->group(function () {


});
Route::middleware(['auth', 'role:admin'])->group(function () {
    // Rutele pentru admin
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::post('/admin', [AdminController::class, 'createEvent'])->name('admin.events.create');
    Route::post('/admin/delete', [AdminController::class, 'deleteEvent'])->name('admin.events.delete');
    Route::post('/admin/tickets/create', [AdminController::class, 'createTicket'])->name('admin.tickets.create');
    Route::prefix('admin')->group(function () {
        Route::resource('sponsors', SponsorController::class);

        Route::prefix('admin/sponsors')->middleware(['auth', 'role:admin'])->group(function () {
            Route::get('/', [SponsorController::class, 'index'])->name('admin.sponsors.index');
            Route::get('/create', [SponsorController::class, 'create'])->name('admin.sponsors.create');
            Route::post('/store', [SponsorController::class, 'store'])->name('admin.sponsors.store');
            Route::get('/{sponsor}', [SponsorController::class, 'show'])->name('admin.sponsors.show');

            Route::prefix('admin/parteners')->middleware(['auth', 'role:admin'])->group(function () {
                Route::get('/', [PartenerController::class, 'index'])->name('admin.parteners.index');
                Route::get('/create', [PartenerController::class, 'create'])->name('admin.parteners.create');
                Route::post('/store', [PartenerController::class, 'store'])->name('admin.parteners.store');
                Route::get('/{partener}', [PartenerController::class, 'show'])->name('admin.parteners.show');
            });

        });
    });
});
