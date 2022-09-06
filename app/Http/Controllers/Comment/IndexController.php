<?php

namespace App\Http\Controllers\Comment;

use App\Models\Comment;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $comments = Comment::paginate(3);
        return view('comments.index', compact('comments'));
    }
}
