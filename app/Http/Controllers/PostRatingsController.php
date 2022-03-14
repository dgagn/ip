<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostRatingsController extends Controller
{
    public function store(Post $post, Request $request)
    {
        $user = $request->user();
        $this->ensureNoDuplicateRating($post, $user);
        $post->like($user);

        return back();
    }

    public function destroy(Post $post, Request $request)
    {
        $user = $request->user();
        $this->ensureNoDuplicateRating($post, $user);
        $post->dislike($user);

        return back();
    }

    private function ensureNoDuplicateRating(Post $post, User $user)
    {
        if ($post->isRatedBy($user)) {
            abort(400);
        }
    }
}
