<?php

use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PostulantController;
use App\Http\Controllers\Admin\ScheduleController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('admin.home');

Route::get('postulants', [PostulantController::class, 'index'])->name('admin.postulants');

Route::resource('courses', CourseController::class)->names('admin.courses');

Route::resource('schedules', ScheduleController::class)->names('admin.schedules');
