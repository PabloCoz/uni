<?php

use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PostulantController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\WorkshopController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('admin.home');

Route::get('postulants', [PostulantController::class, 'index'])->name('admin.postulants');

Route::resource('courses', CourseController::class)->names('admin.courses');

Route::resource('schedules', ScheduleController::class)->names('admin.schedules');

Route::resource('workshops', WorkshopController::class)->names('admin.workshops');

Route::resource('sliders', SliderController::class)->names('admin.sliders');
