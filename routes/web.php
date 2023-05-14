<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\PostulantController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WorkshopController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->middleware('guest')->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/postulants', [PostulantController::class, 'store'])->name('postulants.store');
Route::get('/validate-pay', [PostulantController::class, 'validatedView'])->name('validate-pay');

Route::get('/remember-code', [PostulantController::class, 'rememberCode'])->name('remember-code');

Route::post('/request-code', [PostulantController::class, 'codeRequest'])->name('request-code');

Route::post('/validated-pay', [PostulantController::class, 'validatedPay'])->name('validated-pay');

Route::middleware('auth')->group(function () {
    Route::get('courses', [CourseController::class, 'index'])->name('courses.index');
    Route::get('courses/{course}', [CourseController::class, 'show'])->name('courses.show');
    Route::post('courses/{course}/enrolled', [CourseController::class, 'enrolled'])->name('courses.enrolled');
});

Route::middleware('auth')->group(function () {
    Route::get('workshops', [WorkshopController::class, 'index'])->name('workshops.index');
    Route::get('workshops/{workshop}', [WorkshopController::class, 'show'])->name('workshops.show');
});
require __DIR__.'/auth.php';
