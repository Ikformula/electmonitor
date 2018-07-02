<?php

namespace App\Http\Composers\Backend;

use App\Models\ElectionType;
use Illuminate\View\View;
/**
 * Class ElectionTypeComposer
 */
class ElectionTypesComposer
{

    public function compose(View $view)
    {
        $election_types = ElectionType::all();
        $view->with([
            'election_types' => $election_types
        ]);
    }
}
