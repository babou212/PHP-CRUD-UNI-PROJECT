<?php

namespace Database\Seeders;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(PostsSeeder::class);
        $this->call(CommentsSeeder::class);
    }
}
