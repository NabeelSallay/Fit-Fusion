<?php

use App\Http\Controllers\ClientsController;
use App\Http\Controllers\CoachesController;
use App\Http\Controllers\ConnectionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WorkoutController;
use Illuminate\Support\Facades\Route;




Route::get('/', function (){
    return view('home');
})->name('home');



Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'index'] )->middleware('admin', 'auth')->name('admin');



Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/privacy', function () {
    return view('privacy');
})->name('privacy');

Route::get('/terms', function () {
    return view('terms');
})->name('terms');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');



Route::resource('workout', workoutController::class);

//Route::resource('clients', clientsController::class);

//Route::resource('coaches', coachesController::class);

Route::get('/coaches/index', [CoachesController::class, 'index'])->name('coaches.index');
Route::get('/coaches/create', [CoachesController::class, 'create'])->name('coaches.create');
Route::get('/coaches/show', [CoachesController::class, 'show'])->name('coaches.show');
Route::get('/coaches/edit', [CoachesController::class, 'edit'])->name('coaches.edit');
Route::get('/coaches/destroy', [CoachesController::class, 'destroy'])->name('coaches.destroy');
Route::post('/coaches/store', [CoachesController::class, 'store'])->name('coaches.store');
Route::get('/coaches/{id}/profile', [CoachesController::class, 'viewCoachProfile'])->name('coaches.profile-coach-view');

Route::get('/clients/index', [ClientsController::class, 'index'])->name('clients.index');
Route::get('/clients/create', [ClientsController::class, 'create'])->name('clients.create');
Route::get('/clients/show', [ClientsController::class, 'show'])->name('clients.show');
Route::post('/clients/store', [ClientsController::class, 'store'])->name('clients.store');
Route::get('/clients/edit', [ClientsController::class, 'edit'])->name('clients.edit');

Route::get('/clients/{id}/profile', [ClientsController::class, 'viewClientProfile'])->name('clients.profile-client-view');


Route::post('/connections', [ConnectionController::class, 'store'])->middleware('auth')->name('connections.store');



Route::put('/clients/{client}', [ClientsController::class, 'update'])->name('clients.update');
Route::put('/coaches/{coach}', [CoachesController::class, 'update'])->name('coaches.update');
Route::get('/clients/view', [ClientsController::class, 'viewProfile'])->name('clients.profile');
Route::get('/clients/edit', [ClientsController::class, 'editProfile'])->name('clients.edit-profile');

Route::get('/coach/view/profile', [CoachesController::class, 'viewProfile'])->name('coach.profile');
Route::get('/coach/edit/profile', [CoachesController::class, 'editProfile'])->name('coach.edit.profile');

Route::get('/coaches', [CoachesController::class, 'coachIndex'])->name('coaches.coach-index');
Route::get('/coaches/search', [CoachesController::class, 'search'])->name('coaches.search');

Route::get('/clients', [ClientsController::class, 'clientIndex'])->name('clients.client-index');
Route::get('/clients/search', [ClientsController::class, 'search'])->name('clients.search');

Route::get('/coach/dashboard', [CoachesController::class, 'coachDashboard'])->name('coach.dashboard');

Route::get('/connection-requests', [ConnectionController::class, 'index'])->name('connections.index');
Route::patch('/connections/{connection}/accept', [ConnectionController::class, 'accept'])->name('connections.accept');
Route::patch('/connections/{connection}/reject', [ConnectionController::class, 'reject'])->name('connections.reject');

Route::get('/client/dashboard', [ClientsController::class, 'clientDashboard'])->name('client.dashboard');
Route::delete('/connections/{connection}/cancel', [ConnectionController::class, 'cancel'])
    ->name('connections.cancel');

Route::get('/client/accepted-requests', [ConnectionController::class, 'acceptedRequests'])->name('client.accepted_requests');

Route::get('/coach/accepted-requests', [ConnectionController::class, 'acceptedRequestsForCoach'])->name('coach.accepted_requests');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/home', function () {
        return view('home');
    })->name('home');
});


