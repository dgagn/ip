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
        User::factory(10)->create();

        User::factory()->create([
            'name' => 'gabriel',
            'email' => 'gabriel@email.com'
        ]);

        Rating::factory(5)->create();

        Post::factory(10)->create([
            'user_id' => User::all()->random()->id
        ]);

        Comment::factory(5)->create();
    }
}
