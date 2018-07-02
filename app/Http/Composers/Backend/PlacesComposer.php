<?php

namespace App\Http\Composers\Backend;

use App\Models\Place;
use Illuminate\View\View;


class PlacesComposer
{

    public function compose(View $view)
    {
        $places = Place::all();
        $view->with([
            'places' => $places
        ]);
    }
}
