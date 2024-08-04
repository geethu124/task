<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/Addentries', [App\Http\Controllers\entryController::class, 'Addnewform'])->name('form.show');
Route::post('/create', [App\Http\Controllers\entryController::class, 'create'])->name('entries.store');
Route::get('/entries/{id}/edit', [App\Http\Controllers\entryController::class, 'edit'])->name('entries.edit');
Route::put('/entries/{id}', [App\Http\Controllers\entryController::class, 'update'])->name('entries.update');
Route::delete('users/{id}',[App\Http\Controllers\entryController::class, 'delete'])->name('entries.delete');

