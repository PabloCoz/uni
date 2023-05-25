<?php

use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PostulantController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\TrainingController;
use App\Http\Controllers\Admin\WorkshopController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('admin.home');

Route::get('postulants', [PostulantController::class, 'index'])->name('admin.postulants');

Route::resource('courses', CourseController::class)->names('admin.courses');
Route::post('courser/{course}/approvedCourse', [CourseController::class, 'approvedCourse'])->name('admin.courses.approvedCourse');

Route::resource('schedules', ScheduleController::class)->names('admin.schedules');

Route::resource('workshops', WorkshopController::class)->names('admin.workshops');
Route::post('workshop/{workshop}/approvedWorkshop', [WorkshopController::class, 'approvedWorkshop'])->name('admin.workshops.approvedWorkshop');

Route::resource('trainings', TrainingController::class)->names('admin.trainings');
Route::post('training/{training}/approvedTraining', [TrainingController::class, 'approvedTraining'])->name('admin.trainings.approvedTraining');

Route::resource('sliders', SliderController::class)->names('admin.sliders');
