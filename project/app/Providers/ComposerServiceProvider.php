<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\View\Composers\MemberComposer;
use App\View\Composers\DepartmentComposer;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(
            ['admin.transitions.create', 'admin.transitions.edit'],
            MemberComposer::class
        );

        view()->composer(
            ['admin.transitions.create', 'admin.transitions.edit'],
            DepartmentComposer::class
        );
    }
}
