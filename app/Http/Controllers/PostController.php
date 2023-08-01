<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Services\PostService;
use App\Http\Resources\SuccessResource;
use App\Http\Requests\PostRequest;
class PostController extends Controller
{
   use PostService; 
    public function Post(PostRequest $request)
    { 
        $data = $request->validated();
        $data['user_id']=  auth()->user()->id;
        $this->createPost($data);
        return new SuccessResource($data);
    }

    public function PostAll()
    {
        $posts = Post::all();
        return view('post',compact('posts'));
    }
}
