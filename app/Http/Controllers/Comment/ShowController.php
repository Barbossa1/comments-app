<?php

namespace App\Http\Controllers\Comment;

use App\Http\Requests\Comment\ShowRequest;
use App\Models\Comment;

class ShowController extends BaseController
{
    public function __invoke(ShowRequest $showRequest)
    {
        $comments = Comment::paginate($showRequest->comment_quantity);
        return view('comments.index', compact('comments'));
    }
}
