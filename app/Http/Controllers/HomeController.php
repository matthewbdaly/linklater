<?php

namespace LinkLater\Http\Controllers;

use LinkLater\Contracts\Repositories\Link;
use Illuminate\Contracts\Auth\Guard;
use LinkLater\Contracts\Services\Fetcher;
use LinkLater\Http\Requests\LinkSubmitRequest;
use Tymon\JWTAuth\JWTAuth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Guard $auth, JWTAuth $jwt, Fetcher $fetcher, Link $repository)
    {
        $this->middleware('auth');
        $this->auth = $auth;
        $this->jwt = $jwt;
        $this->fetcher = $fetcher;
        $this->repository = $repository;
    }

    public function welcome()
    {
        return view('welcome');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $links = $this->repository->forUser($this->auth);
        $jwt = $this->jwt->fromUser($this->auth->user());
        return view('home', [
            'links' => $links,
            'jwt' => $jwt
        ]);
    }

    public function store(LinkSubmitRequest $request)
    {
        $title = $this->fetcher->fetch($request->get('url'));
        $link = $this->repository->create([
            'title' => $title,
            'link' => $request->get('url'),
            'user_id' => $this->auth->user()->id
        ]);
        return redirect()->route('home');
    }
}
