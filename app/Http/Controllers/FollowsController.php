<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class FollowsController extends Controller
{
    /**
     * FollowsController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @param User $user
     * @return mixed
     */
    public function store(User $user)
    {
        return auth()->user()->following()->toggle($user->profile->id);
    }
}
