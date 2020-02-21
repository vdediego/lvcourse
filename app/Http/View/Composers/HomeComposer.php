<?php

namespace App\Http\View\Composers;

use App\Post;
use App\Postcard;
use Illuminate\View\View;

class HomeComposer
{
    public function compose(View $view)
    {
        /** with('user') makes the limit=1 to be dynamic on pagination. Problem comes from the template,
         * where the foreach that loops over user, fetches its info. Such query is repeating itself with LIMIT = 1.
         * Better solution is to use LIMIT = pagination
         */
        $myPosts = Post::whereIn('user_id', [auth()->user()->getAuthIdentifier()])->with('user')->latest()->paginate(5);
        $myPostcards = Postcard::whereIn('user_id', [auth()->user()->getAuthIdentifier()])->with('user')->latest()->paginate(5);

        // Calculate posts and postcards followed by the authenticated user
        $profiles = auth()->user()->following()->pluck('profiles.user_id');
        $followedPostcards = Postcard::whereIn('user_id', $profiles)->with('user')->latest()->paginate(5);
        $followedPosts = Post::whereIn('user_id', $profiles)->with('user')->latest()->paginate(5);

        $view->with([
            'posts' => $myPosts,
            'postcards' => $myPostcards,
            'followedPosts' => $followedPosts,
            'followedPostcards' => $followedPostcards,
        ]);
    }
}
