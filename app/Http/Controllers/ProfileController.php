<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function __construct()
    {
    }

    /**
     * @param User $user
     * @return View
     */
    public function index(User $user)
    {
        return view('profile.index', compact('user'));
    }

    /**
     * @param User $user
     * @return View
     * @throws AuthorizationException
     */
    public function edit(User $user)
    {
        $this->authorize('update', $user->profile());

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
        $this->authorize('update', $user->profile());

        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => '',
        ]);

        auth()->user()->profile->update($data);

        return redirect("/profile/{$user->getAuthIdentifier()}");
    }
}
