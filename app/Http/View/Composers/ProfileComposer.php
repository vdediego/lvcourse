<?php

namespace App\Http\View\Composers;

use App\Profile;
use Illuminate\View\View;

class ProfileComposer
{
    public function compose(View $view)
    {
        $allProfiles = Profile::all()->except(auth()->user()->getAuthIdentifier());

        $view->with('profiles', $allProfiles);
    }
}
