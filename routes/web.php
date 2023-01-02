<?php

use App\Http\Controllers\BloodController;
use App\Http\Controllers\ProfileController;
use App\Models\BloodPressureMeasure;
use App\Models\User;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => false, //Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Blood routes
Route::middleware('auth')
    ->controller(BloodController::class)
    ->group(function () {
        Route::get('/blood/{user}', 'index')->name('blood.user');
        Route::post('/blood', 'store');
        Route::delete(
            '/blood/measures/{blood_pressure_measure}',
            'destroy'
        );
    });

// Route::get('/blood', function () {
//     return Inertia::render('Blood');
// })->middleware(['auth', 'verified'])->name('blood');


require __DIR__ . '/auth.php';
