<?php

namespace App\Http\View\Composers;

use App\Post;
use Illuminate\View\View;

class PostComposer
{
    public function compose(View $view)
    {
        $user = auth()->user()->following()->pluck('profiles.user_id');

        /** with('user') makes the limit=1 to be dynamic on pagination. Problem comes from the template,
         * where the foreach that loops over user, fetches its info. Such query is repeating itself with LIMIT = 1.
         * Better solution is to use LIMIT = pagination
         */
        $followedPosts = Post::whereIn('user_id', $user)->with('user')->latest()->paginate(5);
        $view->with('partials.posts.overview_col-6', $followedPosts);
    }
}
