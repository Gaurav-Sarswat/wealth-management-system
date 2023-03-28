<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\IdeatorController;
use App\Http\Controllers\RelationshipManagerController;
use App\Http\Controllers\IdeaController;

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

})->middleware('auth')->name('temp');

// Clients
Route::name('client.')->prefix('client')->group(function(){
    Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login');

    Route::middleware(['auth', 'checkUserType:client'])->group(function () {
        Route::get('/dashboard', [ClientController::class, 'index'])->name('dashboard');
        Route::get('/set-preferences', [ClientController::class, 'setPreferencesView'])->name('set-preferences-view');
        Route::post('/set-preferences', [ClientController::class, 'setPreferences'])->name('set-preferences');
    });
});

// Relationship Manager
Route::name('relationship-manager.')->prefix('relationship-manager')->group(function(){
    Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login');
    
    Route::middleware(['auth', 'checkUserType:rm'])->group(function () {
        Route::get('/dashboard', [RelationshipManagerController::class, 'index'])->name('dashboard');
        Route::get('/ideas', [RelationshipManagerController::class, 'list'])->name('ideas');
        Route::get('/idea/{id}/view', [RelationshipManagerController::class, 'view'])->name('rm-view-idea');
    });
});

// Admin
Route::name('admin.')->prefix('admin')->group(function(){
    Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login');
    
    Route::middleware(['auth', 'checkUserType:admin'])->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
        Route::get('/users', [UserController::class, 'index'])->name('users');
        Route::get('/users/add', [UserController::class, 'show_form'])->name('add-user-form');
        Route::post('/users/add', [UserController::class, 'create'])->name('add-user');
        Route::get('/ideas', [AdminController::class, 'list'])->name('ideas');
        Route::get('/idea/{id}/view', [AdminController::class, 'view'])->name('admin-view-idea');
        Route::get('/profile', [AdminController::class, 'show_profile'])->name('show-profile');
        Route::put('/profile', [AdminController::class, 'update_profile'])->name('update-profile');
    });
});

// Ideator
Route::name('ideator.')->prefix('ideator')->group(function(){
    Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login');
    
    Route::middleware(['auth', 'checkUserType:ideator'])->group(function () {
        Route::get('/dashboard', [IdeatorController::class, 'index'])->name('dashboard'); 
        Route::get('/ideas', [IdeaController::class, 'list'])->name('ideas');
        Route::get('/ideas/add', [IdeaController::class, 'show_form'])->name('create-idea-form');
        Route::post('/ideas/add', [IdeaController::class, 'create'])->name('create-idea');
        Route::get('/idea/{id}', [IdeaController::class, 'updateForm'])->name('update-idea');
        Route::get('/idea/{id}/view', [IdeaController::class, 'view'])->name('view-idea');
    });
});


require __DIR__.'/auth.php';
