<?php

namespace Database\Seeders;

use App\Models\comment\Comment;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Seeder;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws BindingResolutionException
     */
    public function run(): void
    {
        Comment::create([
            'user_id' => 2,
            'post_id' => 1,
            'body' => 'Awesome Post!',
        ]);

        Comment::create([
            'user_id' => 3,
            'post_id' => 2,
            'body' => 'Awesome Post!',
        ]);

        Comment::create([
            'user_id' => 3,
            'post_id' => 3,
            'body' => 'Awesome Post!',
        ]);

        Comment::create([
            'user_id' => 4,
            'post_id' => 4,
            'body' => 'Awesome Post!',
        ]);

        Comment::create([
            'user_id' => 4,
            'post_id' => 4,
            'body' => 'Awesome Post!',
        ]);

        Comment::create([
            'user_id' => 3,
            'post_id' => 4,
            'body' => 'Awesome Post!',
        ]);
    }
}
