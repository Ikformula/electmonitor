<?php

namespace App\Providers;

use App\Http\Composers\Backend\ElectionTypesComposer;
use App\Http\Composers\Backend\PollingStationsComposer;
use Illuminate\Support\Facades\View;
use App\Http\Composers\GlobalComposer;
use Illuminate\Support\ServiceProvider;
use App\Http\Composers\Backend\SidebarComposer;
use App\Http\Composers\Backend\PlacesComposer;

/**
 * Class ComposerServiceProvider.
 */
class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        /*
         * Global
         */
        View::composer(
        // This class binds the $logged_in_user variable to every view
            '*',
            GlobalComposer::class
        );

        /*
         * Frontend
         */

        /*
         * Backend
         */
        View::composer(
        // This binds items like number of users pending approval when account approval is set to true
            'backend.includes.sidebar',
            SidebarComposer::class
        );

        View::composer(
        // This binds polling units collection
            'backend.includes.partials.pollingStationsSelect',
            PollingStationsComposer::class
        );

        View::composer(
        // This binds polling units collection
            'backend.includes.partials.electionTypeSelect',
            ElectionTypesComposer::class
        );

//        View::composer(
//        // This binds polling units collection
//            'backend.includes.partials.placesSelect',
//            PlacesComposer::class
//        );
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
