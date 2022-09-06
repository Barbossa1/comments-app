<?php

namespace App\Services\Comment;

use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class Service
{
    public function store($data)
    {
        $data = [
            'user_id' => Auth::id(),
            'comment' => $data['comment']
        ];
        $comment = Comment::create($data);
        return $comment;
    }
}
