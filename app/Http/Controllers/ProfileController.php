<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function __construct()
    {
    }

    /**
     * @param int $userId
     * @return View
     */
    public function index($userId)
    {
        $user = User::findOrFail($userId);

        return view('profile.index', [
            'user' => $user
        ]);
    }
}