<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */

    public function boot()
    {
        View::composer('*', function ($view) {
            $view->with('jobsMenu', [
                'jobTypes' => [
                    'work-from-home' => 'Work From Home Jobs',
                    'part-time' => 'Part Time Jobs',
                    'freshers' => 'Freshers Jobs',
                    'full-time' => 'Full Time Jobs',
                    'night-shift' => 'Night Shift Jobs',
                ],
                'cities' => ['Bengaluru', 'Mumbai', 'Ahmedabad'],
                'departments' => ['Sales', 'Marketing', 'HR'],
                'companies' => ['TCS', 'Infosys', 'Wipro', 'Reliance'],
            ]);
        });
    }


    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
