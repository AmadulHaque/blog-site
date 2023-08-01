<?php
namespace App\Services;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;

trait CommentService
{
    
    public function createComment(array $data) : Model
    {
        $Comment = Comment::create($data);
        return $Comment;
    }



}