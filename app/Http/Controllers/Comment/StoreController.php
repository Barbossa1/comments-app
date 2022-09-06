<?php

namespace App\Http\Controllers\Comment;

use App\Http\Requests\Comment\ShowRequest;
use App\Http\Requests\Comment\StoreRequest;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $storeRequest, ShowRequest $showRequest)
    {
        if (Auth::check()) {
            $data = $storeRequest->validated();
            $this->sevice->store($data);
        }

        $comments = Comment::paginate($showRequest->comment_quantity);
        return view('comments.index', compact('comments'));
    }
}
