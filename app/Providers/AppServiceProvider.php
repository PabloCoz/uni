<?php

namespace App\Providers;

use App\Models\Lesson;
use App\Models\Module;
use App\Observers\LessonObserver;
use App\Observers\ModuleObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Lesson::observe(LessonObserver::class);
        Module::observe(ModuleObserver::class);
    }
}
