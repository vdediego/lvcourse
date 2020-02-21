<?php

namespace App\Http\View\Composers;

use App\Repositories\PostcardRepository;
use App\Repositories\PostRepository;
use Illuminate\View\View;

class HomeComposer
{
    /**
     * @var PostRepository
     */
    private $postRepository;
    /**
     * @var PostcardRepository
     */
    private $postcardRepository;

    public function __construct(PostRepository $postRepository, PostcardRepository $postcardRepository)
    {
        $this->postRepository = $postRepository;
        $this->postcardRepository = $postcardRepository;
    }

    public function compose(View $view)
    {
        $myPosts = $this->postRepository->getAllMyPosts();
        $myPostcards = $this->postcardRepository->getAllMyPostcards();

        // Calculate posts and postcards followed by the authenticated user
        $followedPosts = $this->postRepository->getFollowedPosts();
        $followedPostcards = $this->postcardRepository->getFollowedPostcards();

        $view->with([
            'posts' => $myPosts,
            'postcards' => $myPostcards,
            'followedPosts' => $followedPosts,
            'followedPostcards' => $followedPostcards,
        ]);
    }
}
