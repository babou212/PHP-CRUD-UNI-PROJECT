<?php

namespace Database\Seeders;

use App\Models\user\User;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
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
            'email' => Hash::make('admin@images-app.com'),
            'email_verified_at' => now(),
            'password' => 'admin',
        ])->assignRole('user', 'admin');

        User::create([
            'name' => 'Dylan',
            'email' => 'Cree-D1@ulster.ac.uk',
            'email_verified_at' => now(),
            'password' => Hash::make('password1234'),
        ])->assignRole('user', 'user');

        app()->make(PermissionRegistrar::class)->forgetCachedPermissions();
    }
}
