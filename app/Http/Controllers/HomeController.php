<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class HomeController extends Controller
{
    //
    public function Home()
    {
        $posts = Post::all();
        return view('app',compact('posts'));
    }
}
