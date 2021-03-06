<?php

namespace App\Http\Controllers;

use App\Postcard;
use Illuminate\Contracts\Support\Renderable;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        $user = auth()->user()->following()->pluck('profiles.user_id');
        if (!$user) {
            echo "U R FOLLOWING NO ONE!!";
        }

        return view('home');
    }
}
