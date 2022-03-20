<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostStoreRequest;
use App\Models\Post;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use function view;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::withRatings()->where('user_id', '=', Auth::id())->get();
        return view('posts.index', ['posts' => $posts]);
    }

    public function show($id)
    {
        $post = Post::withRatings()->findOrFail($id);
        $likedByUser = $post->isLikedBy(Auth::user());

        return view('posts.show', ['post' => $post, 'isLikedByUser' => $likedByUser]);
    }

    public function create(PostCreateRequest $request)
    {
        $request->validated();
        $from = $request->query('from', '');

        return view('posts.create', ['from' => $from]);
    }

    public function store(PostStoreRequest $request)
    {
        $validation = $request->validated();
        $exists = Post::where('ip', '=', $request->ip)->first();

        if ($exists) {
            return back()->withErrors(['ip' => "L'adresse IP existe déjà."])->withInput();
        }

        $user = $request->user();
        $post = $user ? $user->posts()->create($validation) : Post::create($validation);

        if ($user) {
            Rating::create([
                'user_id' => $user->id,
                'post_id' => $post->id,
                'is_liked' => true
            ]);
        }


        return redirect()->route('posts.show', $post->id)->with('status', 'post_create');
    }

    public function destroy($id)
    {
        $post = Post::withRatings()->findOrFail($id);

        $this->authorize('delete', $post);

        $post->delete();

        return back()->with('status', 'delete_ok');
    }
}
