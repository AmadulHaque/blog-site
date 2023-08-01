<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class PostController extends Controller
{
    //
    public function Post(Request $request)
    {
        $post = Post::create([
            'content' => $request->content,
            'user_id' => auth()->user()->id,
        ]);
        return redirect()->back();
    }
}
