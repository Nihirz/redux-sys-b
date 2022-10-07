<?php

namespace App\Http\Controllers;

use App\AdminCategory;
use App\Client;
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
        $category = AdminCategory::count();
        $client = Client::count();
        return view('home', compact('category', 'client'));
    }
}
