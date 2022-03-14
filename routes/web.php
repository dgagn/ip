<?php

use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostRatingsController;
use App\Models\Post;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/", function () {
    $posts = Post::withRatings()->withCommentsCount()->get();

    return view('posts.index', ['posts' => $posts]);
})->name('home');

Route::post('/posts/{post}/comment', [PostCommentsController::class, 'store'])->name('posts.comments.store');

Route::post('/posts/{post}/rate', [PostRatingsController::class, 'store'])->name('posts.ratings');
Route::delete('/posts/{post}/rate', [PostRatingsController::class, 'destroy']);

Route::get("/api/{id}", function ($id) {
    $post = Post::withRatings()->findOrFail($id);
    $isRatedByUser = $post->isRatedBy(Auth::user());
    return view('posts.show', ['post' => $post, 'isRatedByUser' => $isRatedByUser]);
})->name('post');


require __DIR__ . "/auth.php";
