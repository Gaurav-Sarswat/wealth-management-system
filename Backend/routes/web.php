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
        Route::get('/set-preferences', [ClientController::class, 'set_preferences_view'])->name('set-preferences-view');
        Route::post('/set-preferences', [ClientController::class, 'set_preferences'])->name('set-preferences');
        Route::get('/suggested-ideas', [ClientController::class, 'suggested_ideas'])->name('suggested-ideas');
        Route::get('/idea/{id}/view', [ClientController::class, 'view'])->name('view-idea');
    });
});

// Relationship Manager
Route::name('relationship-manager.')->prefix('relationship-manager')->group(function(){
    Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login');
    
    Route::middleware(['auth', 'checkUserType:rm'])->group(function () {
        Route::get('/dashboard', [RelationshipManagerController::class, 'index'])->name('dashboard');
        Route::get('/users', [UserController::class, 'index'])->name('users');
        Route::get('/users/{id}', [UserController::class, 'view_user'])->name('rm-view-user');
        Route::get('/ideas', [RelationshipManagerController::class, 'list'])->name('ideas');
        Route::get('/idea/{id}/view', [RelationshipManagerController::class, 'view'])->name('rm-view-idea');
        Route::get('/profile', [RelationshipManagerController::class, 'show_profile'])->name('show-profile');
        Route::put('/profile', [RelationshipManagerController::class, 'update_profile'])->name('update-profile');
        Route::get('/idea/{id}/accept', [RelationshipManagerController::class, 'accept'])->name('rm-accept-idea');
        Route::get('/idea/{id}/reject', [RelationshipManagerController::class, 'reject'])->name('rm-reject-idea');
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

        Route::get('/data', function() {
            return view('admin.data');
        })->name('data');

        Route::get('/data/currencies', [CurrencyController::class, 'show_currencies'])->name('show_currencies');
        Route::get('/data/currencies/add', [CurrencyController::class, 'add_currencies_view'])->name('add_currencies_view');
        Route::post('/data/currencies/add', [CurrencyController::class, 'add_currencies'])->name('add_currencies');

        Route::get('/data/regions', [RegionController::class, 'show_regions'])->name('show-regions');
        Route::get('/data/regions/add', [RegionController::class, 'add_regions_view'])->name('add-region-view');
        Route::post('/data/regions/add', [RegionController::class, 'add_region'])->name('add-region');
        
        Route::get('/data/countries', [CountriesController::class, 'show_countries'])->name('show-countries');
        Route::get('/data/countries/add', [CountriesController::class, 'add_countries_view'])->name('add-countries-view');
        Route::post('/data/countries/add', [CountriesController::class, 'add_country'])->name('add-country');
        Route::get('/data/major-sectors', [MajorSectorController::class, 'show_major_sector'])->name('show_major_sector');
        Route::get('/data/major-sectors/add', [MajorSectorController::class, 'add_major_sector_view'])->name('add_major_sector_view');
        Route::post('/data/major-sectors/add', [MajorSectorController::class, 'add_major_sector'])->name('add_major_sector');
        Route::get('/data/minor-sectors', [MinorSectorController::class, 'show_minor_sector'])->name('show_minor_sector');
        Route::get('/data/minor-sectors/add', [MinorSectorController::class, 'add_minor_sector_view'])->name('add_minor_sector_view');
        Route::post('/data/minor-sectors/add', [MinorSectorController::class, 'add_minor_sector'])->name('add_minor_sector');
        
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
        Route::get('/idea/{id}', [IdeaController::class, 'update_idea_form'])->name('update-idea-form');
        Route::put('/idea/{id}', [IdeaController::class, 'update_idea'])->name('update-idea');
        Route::get('/idea/{id}/view', [IdeaController::class, 'view'])->name('view-idea');
    });
});


require __DIR__.'/auth.php';
