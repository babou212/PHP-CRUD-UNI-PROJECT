<?php

namespace Database\Seeders;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * @throws BindingResolutionException
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(PostsSeeder::class);

        app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();
    }
}
