<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostSearchRequest;
use App\Models\Post;
use function redirect;
use function view;

class PostSearchController extends Controller
{
    public function index(PostSearchRequest $request)
    {
        $request->validated();

        $query = $request->input('q');

        $posts = Post::withRatingsAndCommentsCount();

        $allPosts = [];
        foreach ($posts as $post) {
            if ($post->ip === $query) {
                return redirect()->route('posts.show', $post->id);
            }
            $percent = 0;
            similar_text($query, $post, $percent);
            $post->similarity = $percent;
            $allPosts[] = $post;
        }

        usort($allPosts, function ($old, $next) {
            return $next->similarity <=> $old->similarity;
        });

        $firstThree = array_slice($allPosts, 0, 3);

        return view('posts.search', ['posts' => $firstThree, 'query' => $query]);
    }
}
