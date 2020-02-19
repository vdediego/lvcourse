<?php

namespace App\Http\Controllers;

use App\Postcard;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use Intervention\Image\Facades\Image;

class PostcardController extends Controller
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
        return view('postcard.create');
    }

    /**
     * @return Redirector
     */
    public function store()
    {
        $data = Request()->validate([
            'recipient_name' => 'required',
            'recipient_address' => 'required',
            'body' => '',
            'image' => ['required', 'image']
        ]);

        // Save physically the image into 'public' dir
        $imgPath = Request('image')->store('uploads', 'public');
        $image = Image::make(public_path("storage/{$imgPath}"))->fit(600,600);
        $image->save();

        /** @var Postcard $createdPostcard */
        $createdPostcard = auth()->user()->postcards()->create([
            'recipient_name' => $data['recipient_name'],
            'recipient_address' => $data['recipient_address'],
            'body' => $data['body'] ?? '',
        ]);

        $createdPostcard->image()->create(['filename' => $imgPath]);

        return redirect('profile/' . auth()->user()->getAuthIdentifier());
    }

    /**
     * @param Postcard $postcard
     * @return View
     */
    public function show(Postcard $postcard)
    {
        return view('postcard.show', compact('postcard'));
    }
}
