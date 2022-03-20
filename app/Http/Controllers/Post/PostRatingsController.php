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
        $user = $request->user();
        $this->ensureNoDuplicateRating($post, $user);
        $post->like($user);

        return back()->with('status', 'rating_ok');
    }

    public function destroy(Post $post, Request $request)
    {
        $user = $request->user();
        $this->ensureNoDuplicateRating($post, $user);
        $post->dislike($user);

        return back()->with('status', 'rating_ok');
    }

    private function ensureNoDuplicateRating(Post $post, User $user)
    {
        if ($post->isRatedBy($user)) {
            abort(400);
        }
    }
}