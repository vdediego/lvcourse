<?php

namespace App\Http\Controllers;

use App\Post;
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
        $users = auth()->user()->following()->pluck('profile.user_id');

        $posts = Post::whereIn('user_id', $users)->latest()->get();

        return view('post.index', compact('posts'));
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

        $imgPath = Request('image')->store('uploads', 'public');
        $image = Image::make(public_path("storage/{$imgPath}"))->fit(1200,1200);
        $image->save();

        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imgPath,
        ]);

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
