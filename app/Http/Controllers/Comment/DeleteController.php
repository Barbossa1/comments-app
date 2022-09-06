<?php

namespace App\Http\Controllers\Comment;

use App\Http\Requests\Comment\ShowRequest;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class DeleteController extends BaseController
{
    public function __invoke(Comment $comment, ShowRequest $showRequest)
    {
        if (Auth::check()) {
            $comment->delete();
        }
        $comments = Comment::paginate($showRequest->comment_quantity);
        return view('comments.index', compact('comments'));
    }
}
