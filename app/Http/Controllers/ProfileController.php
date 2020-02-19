<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{

    /**
     * @param User $user
     * @return View
     */
    public function index(User $user)
    {
        // Cache pre-calculated counters (30 seconds)
        $cacheSecs = now()->addSeconds(30);
        $postCount = Cache::remember(
            'count.posts.' . $user->id,
            $cacheSecs,
            function () use ($user) {return $user->posts()->count();}
        );
        $postcardCount = Cache::remember(
            'count.postcards.' . $user->id,
            $cacheSecs,
            function () use ($user) {return $user->postcards()->count();}
        );
        $followersCount = Cache::remember(
            'count.followers.' . $user->id,
            $cacheSecs,
            function () use ($user) {return $user->profile->followers()->count();}
        );
        $followingCount = Cache::remember(
            'count.following.' . $user->id,
            $cacheSecs,
            function () use ($user) {return $user->following()->count();}
        );

        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        return view('profile.index', compact('user', 'follows', 'postCount', 'postcardCount', 'followersCount', 'followingCount'));
    }

    /**
     * @param User $user
     * @return View
     * @throws AuthorizationException
     */
    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);

        return view('profile.edit', compact('user'));
    }

    /**
     * @param User $user
     * @return Redirector
     *
     * @throws AuthorizationException
     */
    public function update(User $user)
    {
        $this->authorize('update', $user->profile);

        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => '',
        ]);

        $imgPath = '';
        if (request('image')) {
            $imgPath = Request('image')->store('profile', 'public');
            $image = Image::make(public_path("storage/{$imgPath}"))->fit(1000,1000);
            $image->save();
        }

        auth()->user()->profile->update(
            array_merge(
                $data,
                ['image' => $imgPath]
            )
        );

        return redirect("/profile/{$user->getAuthIdentifier()}");
    }
}
