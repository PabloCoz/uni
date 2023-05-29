<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostulantController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\WorkshopController;
use App\Http\Livewire\Courses\CourseStatus;
use App\Http\Livewire\Courses\CourseUser;
use App\Http\Livewire\Trainings\TrainingStatus;
use App\Http\Livewire\Workshops\WorkshopStatus;
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

Route::get('/', WelcomeController::class)->middleware('guest')->name('home');

Route::get('/dashboard', HomeController::class)->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/postulants', [PostulantController::class, 'index'])->name('postulants.index');
Route::post('/postulants/register', [PostulantController::class, 'store'])->name('postulants.store');
Route::get('/validate-pay', [PostulantController::class, 'validatedView'])->name('validate-pay');

Route::get('/remember-code', [PostulantController::class, 'rememberCode'])->name('remember-code');

Route::post('/request-code', [PostulantController::class, 'codeRequest'])->name('request-code');

Route::post('/validated-pay', [PostulantController::class, 'validatedPay'])->name('validated-pay');

Route::middleware('auth')->group(function () {
    Route::get('courses', [CourseController::class, 'index'])->name('courses.index');
    Route::get('courses/{course}', [CourseController::class, 'show'])->name('courses.show');
    Route::post('courses/{course}/enrolled', [CourseController::class, 'enrolled'])->name('courses.enrolled');
    Route::get('courses/course-status/{course}', CourseStatus::class)->name('courses.status');
    Route::get('my-courses', CourseUser::class)->name('courses.my-courses');
});

Route::middleware('auth')->group(function () {
    Route::get('workshops', [WorkshopController::class, 'index'])->name('workshops.index');
    Route::get('workshops/{workshop}', [WorkshopController::class, 'show'])->name('workshops.show');
    Route::post('workshops/{workshop}/enrolled', [WorkshopController::class, 'enrolled'])->name('workshops.enrolled');
    Route::get('workshops/workshop-status/{workshop}', WorkshopStatus::class)->name('workshops.status');
});

Route::middleware('auth')->group(function (){
    Route::get('trainings', [TrainingController::class, 'index'])->name('trainings.index');
    Route::get('trainings/{training}', [TrainingController::class, 'show'])->name('trainings.show');
    Route::post('trainings/{training}/enrolled', [TrainingController::class, 'enrolled'])->name('trainings.enrolled');
    Route::get('trainings/training-status/{training}', TrainingStatus::class)->name('trainings.status');
});

require __DIR__.'/auth.php';
