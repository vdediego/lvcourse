<?php

namespace App\Http\Controllers;

use App\Post;
use App\Postcard;
use Illuminate\Contracts\View\Factory;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    /**
     * PostController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return Factory|View
     */
    public function index()
    {
        $user = auth()->user()->following()->pluck('profiles.user_id');
        if (!$user) {
            echo "U R FOLLOWING NO ONE!!";
        }

        /** with('user') makes the limit=1 to be dynamic on pagination. Problem comes from the template,
         * where the foreach that loops over user, fetches its info. Such query is repeating itself with LIMIT = 1.
         * Better solution is to use LIMIT = pagination
        */
        $posts = Post::whereIn('user_id', $user)->with('user')->latest()->paginate(5);
        $postcards = Postcard::whereIn('user_id', $user)->with('user')->latest()->paginate(5);

        return view('post.index', compact('posts', 'postcards'));
    }

    /**
     * @return View
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * @return Redirector
     */
    public function store()
    {
        $data = Request()->validate([
           'caption' => 'required',
           'image' => ['required', 'image']
        ]);

        // Save physically the image into 'public' dir
        $imgPath = Request('image')->store('uploads', 'public');
        $image = Image::make(public_path("storage/{$imgPath}"))->fit(1200,1200);
        $image->save();

        // Create the Post associated to that User
        /** @var Post $createdPost */
        $createdPost = auth()->user()->posts()->create([
            'caption' => $data['caption'],
        ]);

        // Create the Image associated to that Post
        $createdPost->image()->create(['filename' => $imgPath]);

        return redirect('profile/' . auth()->user()->getAuthIdentifier());
    }

    /**
     * @param Post $post
     * @return View
     */
    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }
}
