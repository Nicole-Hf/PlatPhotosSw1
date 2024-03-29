<?php

use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\TransaccionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\InvitacionController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PhotographerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'home'])->name('index');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/fotografo/home', [App\Http\Controllers\HomeController::class, 'homeFotografo'])->name('home.fotografo');
Route::get('/organizador/home', [App\Http\Controllers\HomeController::class, 'homeOrganizador'])->name('home.organizador');
Route::get('/invitado/home', [App\Http\Controllers\HomeController::class, 'homeInvitado'])->name('home.invitado');

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::resource('roles', RolController::class);
    Route::resource('usuarios', UserController::class);
    Route::resource('eventos', EventoController::class);
    Route::resource('fotografos', PhotographerController::class);
    Route::resource('galleries', GalleryController::class);
    Route::resource('catalogos', CatalogoController::class);
    Route::resource('profiles', ProfileController::class);

    Route::get('eventos/{evento_id}/download', [EventoController::class, 'download'])->name('eventos.download');
    Route::get('eventos/{evento_id}/invitados', [EventoController::class, 'addGuests'])->name('eventos.invitados');
    Route::post('eventos/invitados/{evento_id}', [EventoController::class, 'storeGuest'])->name('eventos.storeguest');
    Route::get('evento/{evento_id}', [EventoController::class, 'invitation'])->name('eventos.invitation');
    Route::post('catalogos/{catalogo_id}/store', [CatalogoController::class, 'store'])->name('catalogos.store');
    Route::get('catalogo/{catalogo_id}', [CatalogoController::class, 'photos'])->name('catalogos.photos');
    Route::get('catalogo/{catalogo_id}/evento', [CatalogoController::class, 'catalogos'])->name('catalogos.invitados');
    Route::get('invitaciones', [InvitacionController::class, 'index'])->name('invitaciones.index');
    Route::post('invitacion/{fotografo_id}', [InvitacionController::class, 'store'])->name('invitaciones.store');
    Route::post('invitacion/{evento_id}/acept', [InvitacionController::class, 'changeStatus'])->name('invitaciones.changeStatus');
    Route::get('mark_all_notifications', [NotificationController::class, 'mark_all_notifications'])->name('mark_all_notifications');
    Route::get('mark_a_notification/{notification_id}/{evento_id}', [NotificationController::class, 'mark_a_notification'])->name('mark_a_notification');
    Route::get('notifications', [NotificationController::class, 'watch_all_notifications'])->name('watch_all_notifications');

    Route::get('/shop', [CartController::class, 'shop'])->name('shop');
    Route::get('/cart', [CartController::class, 'cart'])->name('cart.index');
    Route::post('/add', [CartController::class, 'add'])->name('cart.store');
    Route::post('/update', [CartController::class, 'update'])->name('cart.update');
    Route::post('/remove', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/clear', [CartController::class, 'clear'])->name('cart.clear');

    Route::get('/checkout', [TransaccionController::class, 'index']);
    Route::post('/process-checkout', [TransaccionController::class, 'process'])->name('process.checkout');
    Route::get('/confirmation/{orderid}', [TransaccionController::class, 'showConfirmation'])->name('order.confirmation');

    Route::get('/invitacion/{id}', [InvitacionController::class, 'showInvitationToUser'])->name('ver-invitacion');
    Route::post('invitacion/{id}/asistencia', [InvitacionController::class, 'markAsistencia'])->name('invitaciones.markAsistencia');
});


