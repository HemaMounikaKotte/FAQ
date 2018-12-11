<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $questions = $user->questions()->paginate(6);
        $posts = Post::orderBy('id', 'desc')->paginate(10);
        return view('home')->with('questions', $questions)->with('posts', $posts);
    }

//    public function post()
//    {
//        $posts = Post::orderBy('id', 'desc')->paginate(10);
//        return view('home')->withPosts($posts);
//    }
}
