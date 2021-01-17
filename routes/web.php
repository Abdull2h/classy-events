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
// update
// destroy

/*
|    index -> all events owned by user (host_dashboard)
|    show -> single event that owned by user
|    create/store/edit/upadte/delete/destroy -> if user is host
*/

// Attendant Routes
/*
|    Create(X) -> if user Host + own the event
|    edit(X) -> if user Host + own the event
|    delete(X) -> if user Host + own the event
*/

// Guard Routes
/*
|    index -> all events guarded by user (guard_dashboard)
|    show -> single event that guarded by user
*/

// Admin Routes
/*
|   index -> all events (admin_dashboard)
|   show -> single event
|   edit/delete -> if user is admin
*/
