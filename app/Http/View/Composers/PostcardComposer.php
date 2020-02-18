<?php


namespace App\Http\View\Composers;


use App\Postcard;
use Illuminate\View\View;

class PostcardComposer
{
    public function compose(View $view)
    {
        $view->with('postcards', Postcard::orderBy('created_at')->get());
    }
}
