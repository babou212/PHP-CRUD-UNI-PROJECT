<?php

namespace Database\Seeders;

use App\Models\user\User;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
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
        $admin = Role::create(['name' => 'admin']);
        $user = Role::create(['name' => 'user']);

        Permission::create(['name' => 'edit posts']);
        Permission::create(['name' => 'delete posts']);
        Permission::create(['name' => 'delete comments']);

       User::create([
            'name' => 'admin',
            'email' => 'admin@images-app.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin'),
        ])->assignRole($admin, $user);

        User::create([
            'name' => 'Dylan',
            'email' => 'Cree-D1@ulster.ac.uk',
            'email_verified_at' => now(),
            'password' => Hash::make('password1234'),
        ])->assignRole($user);

        app()->make(PermissionRegistrar::class)->forgetCachedPermissions();
    }
}
