<?php

namespace Database\Seeders;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\PermissionRegistrar;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws BindingResolutionException
     */
    public function run(): void
    {
//        Role::create(['name' => 'admin']);
//        Role::create(['name' => 'user']);
//
//        Permission::create(['name' => 'edit posts']);
//        Permission::create(['name' => 'delete posts']);
//        Permission::create(['name' => 'delete comments']);

        app()->make(PermissionRegistrar::class)->forgetCachedPermissions();
    }
}
