<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Spare;
use App\User;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $spare_count = Spare::all()->count();
        $client_count = Client::all()->count();
        $user_count = User::all()->count();

        return view('admin.home', compact(['spare_count', 'client_count', 'user_count']));
    }
}
