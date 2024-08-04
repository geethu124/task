<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entries;
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
        $entries=Entries::all();
        // return view('entries.form',$entries);
        return view('home',['entries' => $entries]);
    }
}
