<?php

namespace App\Http\Composers\Backend;

use App\Models\PollingStation;
use Illuminate\View\View;
use App\Repositories\Backend\Auth\UserRepository;

/**
 * Class PollingUnitsComposer.
 */
class PollingStationsComposer
{

    public function compose(View $view)
    {
        $polling_stations = PollingStation::all();
        $view->with([
            'polling_stations' => $polling_stations
        ]);
    }
}
