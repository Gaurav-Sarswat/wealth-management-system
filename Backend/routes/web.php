<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\IdeatorController;
use App\Http\Controllers\RelationshipManagerController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/temp-page', function() {

    return view('temp');

})->middleware(['auth'])->name('temp');

// Clients
Route::name('client.')->prefix('client')->group(function(){
    Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login');

    Route::middleware(['auth', 'checkUserType:client'])->group(function () {
        Route::get('/dashboard', [ClientController::class, 'index'])->name('dashboard');
    });
});

// Relationship Manager
Route::name('relationship-manager.')->prefix('relationship-manager')->group(function(){
    Route::post('/login', [AuthenticatedSessionController::class, 'login'])->name('login');
    
    Route::middleware(['auth', 'checkUserType:rm'])->group(function () {
        Route::get('/dashboard', [RelationshipManagerController::class, 'index'])->name('dashboard');
    });
});

// Admin
Route::name('admin.')->prefix('admin')->group(function(){
    Route::post('/login', [AuthenticatedSessionController::class, 'login'])->name('login');
    
    Route::middleware(['auth', 'checkUserType:admin'])->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
        Route::get('/users', [UserController::class, 'index'])->name('users');
        Route::get('/users/add', [UserController::class, 'show_form'])->name('add-user-form');
        Route::post('/users/add', [UserController::class, 'create'])->name('add-user');
    });
});

// Ideator
Route::name('ideator.')->prefix('ideator')->group(function(){
    Route::post('/login', [AuthenticatedSessionController::class, 'login'])->name('login');
    
    Route::middleware(['auth', 'checkUserType:ideator'])->group(function () {
        Route::get('/dashboard', [IdeatorController::class, 'index'])->name('dashboard');
    });
});


require __DIR__.'/auth.php';
