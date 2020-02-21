<?php

namespace App\Repositories;

use App\Post;

class PostRepository
{
    /**
     * @param int $paginate
     * @return mixed
     */
    public function getAllMyPosts(int $paginate = 5)
    {
        /** using "with('user')" makes the limit=1 to be dynamic on pagination. Problem comes from the template,
         * where the foreach that loops over user, fetches its info. Such query is repeating itself with LIMIT = 1.
         * Better solution is to use LIMIT = pagination
         */
        return Post::where('user_id', auth()->user()->getAuthIdentifier())
            ->with('user')
            ->latest()
            ->paginate($paginate);
    }

    /**
     * @param int $paginate
     * @return mixed
     */
    public function getFollowedPosts(int $paginate = 5)
    {
        $followedUsers = auth()->user()->following()->pluck('profiles.user_id');

        return Post::whereIn('user_id', $followedUsers)
            ->with('user')
            ->latest()
            ->paginate($paginate);
    }

}
