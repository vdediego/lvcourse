<?php

namespace App\Http\Controllers;

use App\Post;
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
