<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repositories\TeacherRepositoryInterface',
            'App\Repositories\TeacherRepository'
        );

        $this->app->bind(
            'App\Repositories\StudentRepositoryInterface',
            'App\Repositories\StudentRepository'
        );

        $this->app->bind(
            'App\Repositories\StudyFeesRepositoryInterface',
            'App\Repositories\StudyFeesRepository'
        );

        $this->app->bind(
            'App\Repositories\FeesInvoicesRepositoryInterface',
            'App\Repositories\FeesInvoicesRepository'
        );

        $this->app->bind(
            'App\Repositories\ReceiptStudentRepositoryInterface',
            'App\Repositories\ReceiptStudentRepository'
        );

        $this->app->bind(
            'App\Repositories\ProcessingFeesRepositoryInterface',
            'App\Repositories\ProcessingFeesRepository'
        );

        $this->app->bind(
            'App\Repositories\PaymentStudentRepositoryInterface',
            'App\Repositories\PaymentStudentRepository'
        );

        $this->app->bind(
            'App\Repositories\AttendancesRepositoryInterface',
            'App\Repositories\AttendancesRepository'
        );

        $this->app->bind(
            'App\Repositories\ExamsRepositoryInterface',
            'App\Repositories\ExamsRepository'
        );

        $this->app->bind(
            'App\Repositories\QuestionsRepositoryInterface',
            'App\Repositories\QuestionsRepository'
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Schema::enableForeignKeyConstraints();
    }
}
