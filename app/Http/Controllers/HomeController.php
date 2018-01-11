<?php

namespace LinkLater\Http\Controllers;

use Illuminate\Http\Request;
use LinkLater\Eloquent\Models\Link;
use Illuminate\Contracts\Auth\Guard;
use LinkLater\Contracts\Fetcher;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Guard $auth, Fetcher $fetcher)
    {
        $this->middleware('auth');
        $this->auth = $auth;
        $this->fetcher = $fetcher;
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

    public function store(Request $request)
    {
        $title = $this->fetcher->fetch($request->get('url'));
        $link = Link::create([
            'title' => $title,
            'link' => $request->get('url'),
            'user_id' => $this->auth->user()->id
        ]);
        return redirect()->route('home');
    }
}
