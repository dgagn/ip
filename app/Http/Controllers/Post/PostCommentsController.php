<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use function back;

class PostCommentsController extends Controller
{
    public function store(Post $post, Request $request)
    {
        $request->validate([
            'body' => 'required'
        ]);

        $post->comments()->create([
            'user_id' => $request->user()->id,
            'body' => $request->input('body')
        ]);

        return back()->with('status', 'comment_sent');
    }
}
