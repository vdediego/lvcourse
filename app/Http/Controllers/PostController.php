<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('post.create');
    }

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

    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }
}