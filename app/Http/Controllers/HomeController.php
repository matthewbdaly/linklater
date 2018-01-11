<?php

namespace LinkLater\Http\Controllers;

use Illuminate\Http\Request;
use LinkLater\Eloquent\Models\Link;
use Illuminate\Contracts\Auth\Guard;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->middleware('auth');
        $this->auth = $auth;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $links = Link::forUser($this->auth)->get();
        return view('home', [
            'links' => $links
        ]);
    }
}
