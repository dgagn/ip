<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Rating;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $gab = User::factory()->create([
            'name' => 'gabriel',
            'email' => 'gabriel@email.com'
        ]);

        Post::factory(10)->create([
            'user_id' => $gab
        ]);

        Post::factory(10)->create();

        $first = Post::where('user_id', '=', $gab->id)->get();

        Rating::factory(10)->create([
            'post_id' => $first->first()->id,
            'is_liked' => true
        ]);

        Rating::factory(11)->create([
            'post_id' => $first[1]->id,
            'is_liked' => true
        ]);

        Rating::factory(10)->create([
            'post_id' => $first[2]->id,
            'is_liked' => false
        ]);

        Rating::factory(100)->create();

        Post::factory(50)->create([
            'user_id' => User::all()->random()->id
        ]);

        Comment::factory(5)->create();
    }
}
