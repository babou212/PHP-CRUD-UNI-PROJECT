<?php

namespace Database\Seeders;

use App\Models\comment\Comment;
use Illuminate\Database\Seeder;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Comment::factory()->count(40)->create();
    }
}
