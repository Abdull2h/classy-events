<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Event Routes
Route::get('/host', [App\Http\Controllers\EventController::class, 'index'])->name('host_dashboard');
Route::get('/event/create', [App\Http\Controllers\EventController::class, 'create'])->name('create_event');
Route::post('/event/create', [App\Http\Controllers\EventController::class, 'store'])->name('store_event');
Route::get('/event/show/{id}', [App\Http\Controllers\EventController::class, 'show'])->name('show_event');
Route::get('/event/edit/{id}', [App\Http\Controllers\EventController::class, 'edit'])->name('edit_event');
Route::put('/event/edit/{id}', [App\Http\Controllers\EventController::class, 'update'])->name('update_event');
Route::delete('/event/delete/{id}', [App\Http\Controllers\EventController::class, 'destroy'])->name('delete_event');

// Doorman Routes
Route::get('/doorman', [App\Http\Controllers\DoormanController::class, 'index'])->name('doorman_dashboard');
//Route::get('/event/show/{id}', [App\Http\Controllers\DoormanController::class, 'show'])->name('show_event');

// Attendant Routes
Route::get('/event/show/{id}/add_invite', [App\Http\Controllers\AttendantController::class, 'create'])->name('create_invite');
Route::post('event/show/{id}/add_invite', [App\Http\Controllers\AttendantController::class, 'store'])->name('store_invite');
Route::get('/event/show/{id}/edit_invite/{aid}', [App\Http\Controllers\AttendantController::class, 'edit'])->name('edit_invite');
Route::put('/event/show/{id}/edit_invite/{aid}', [App\Http\Controllers\AttendantController::class, 'update'])->name('update_invite');
Route::delete('/event/show/{id}/delete_invite/{aid}', [App\Http\Controllers\AttendantController::class, 'destroy'])->name('delete_invite');

// Admin Routes
/*
|   index -> all events (admin_dashboard)
|   show -> single event
|   edit/delete -> if user is admin
*/
