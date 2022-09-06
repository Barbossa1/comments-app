<?php

namespace App\Http\Controllers\Comment;

use App\Http\Requests\Comment\ShowRequest;
use App\Http\Requests\Comment\UpdateRequest;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $updateRequest, Comment $comment, ShowRequest $showRequest)
    {
        if (Auth::check()) {
            $data = $updateRequest->validated();
            $comment->update($data);
        }

        $comments = Comment::paginate($showRequest->comment_quantity);
        return view('comments.index', compact('comments'));
    }
}
