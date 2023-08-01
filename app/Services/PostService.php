<?php
namespace App\Services;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;

trait PostService
{
    
    public function createPost(array $data) : Model
    {
        $post = Post::create($data);
        return $post;
    }



}