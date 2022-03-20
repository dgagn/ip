<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use function abort;
use function back;

class PostRatingsController extends Controller
{
    public function store(Post $post, Request $request)
    {
        $this->authorize('rate', $post);

        $post->like($request->user());

        return back()->with('status', 'rating_ok');
    }

    public function destroy(Post $post, Request $request)
    {
        $this->authorize('rate', $post);

        $post->dislike($request->user());

        return back()->with('status', 'rating_ok');
    }
}
