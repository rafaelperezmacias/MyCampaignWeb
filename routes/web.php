<?php

use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SympathizerController;
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

/* Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
}); */

// Home
Route::get('home', [HomeController::class, 'index'])->name('home.index');
Route::post('home', [HomeController::class, 'campaign'])->name('home.campaign');

// Administradores
Route::resource('administrators', AdministratorController::class);

// Examples
// Listado de rutas de persona
/* Route::get('/persona', [PersonaController::class, 'index'])
    ->name('get-persona-index')->middleware('auth');
Route::get('/persona/create', [PersonaController::class, 'create'])
    ->name('get-persona-create')->middleware('auth');
Route::post('/persona/create', [PersonaController::class, 'store'])
    ->name('post-persona-store')->middleware('auth');
Route::delete('/persona/{persona}', [PersonaController::class, 'destroy'])
    ->name('delete-persona-destroy')->middleware('auth');
Route::put('/persona/{persona}', [PersonaController::class, 'update'])
    ->name('put-persona-update')->middleware('auth');
Route::get('/persona/{persona}', [PersonaController::class, 'show'])
    ->name('get-persona-show')->middleware('auth');
Route::get('/persona/{persona}/edit', [PersonaController::class, 'edit'])
    ->name('get-persona-edit')->middleware('auth');*/

// Campañas
Route::resource('campaigns', CampaignController::class);

// Simpatizantes
Route::resource('sympathizers', SympathizerController::class);
