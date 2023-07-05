<?php

use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PostulantController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\TrainingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\WorkshopController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->middleware('can:Ver Dashboard')->name('admin.home');

Route::get('postulants', [PostulantController::class, 'index'])->middleware('can:Listar Usuarios')->name('admin.postulants');

Route::resource('courses', CourseController::class)->middleware('can:Leer Contenido')->names('admin.courses');
Route::post('courser/{course}/approvedCourse', [CourseController::class, 'approvedCourse'])->middleware('can:Publicar Contenido')->name('admin.courses.approvedCourse');

Route::resource('schedules', ScheduleController::class)->middleware('can:Leer Contenido')->names('admin.schedules');

Route::resource('workshops', WorkshopController::class)->middleware('can:Leer Contenido')->names('admin.workshops');
Route::post('workshop/{workshop}/approvedWorkshop', [WorkshopController::class, 'approvedWorkshop'])->middleware('can:Publicar Contenido')->name('admin.workshops.approvedWorkshop');

Route::resource('trainings', TrainingController::class)->middleware('can:Leer Contenido')->names('admin.trainings');
Route::post('training/{training}/approvedTraining', [TrainingController::class, 'approvedTraining'])->middleware('can:Publicar Contenido')->name('admin.trainings.approvedTraining');

Route::resource('sliders', SliderController::class)->middleware('can:Leer Contenido')->names('admin.sliders');

Route::resource('events', EventController::class)->middleware('can:Leer Contenido')->names('admin.events');

Route::resource('roles', RoleController::class)->middleware('can:Listar Role')->names('admin.roles');

Route::resource('users', UserController::class)->middleware('can:Listar Usuarios')->only('index', 'edit', 'update')->names('admin.users');
