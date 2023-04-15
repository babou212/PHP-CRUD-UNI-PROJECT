<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws BindingResolutionException
     */
    public function run(): void
    {
       User::create([
            'name' => 'admin',
            'email' => 'admin@images-app.com',
            'email_verified_at' => now(),
            'password' => 'admin',
        ])->assignRole('user', 'admin');

        User::create([
            'name' => 'Dylan',
            'email' => 'Cree-D1@ulster.ac.uk',
            'email_verified_at' => now(),
            'password' => 'password1234',
        ])->assignRole('user', 'user');

        app()->make(PermissionRegistrar::class)->forgetCachedPermissions();
    }
}
