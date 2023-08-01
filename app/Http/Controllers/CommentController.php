<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Services\CommentService;
use App\Http\Resources\SuccessResource;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{
    use CommentService;
    public function Commentpost(CommentRequest $request)
    { 
        $data = $request->validated();
        $this->createComment($data);
        return new SuccessResource($data);
    }


}
