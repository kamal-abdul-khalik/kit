<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions categories
        // Permission::create(['name' => 'index categories']);

        // create roles and assign existing permissions
        $member = Role::create(['name' => 'member']);
        // $member->givePermissionTo('index transactions');

        $admin = Role::create(['name' => 'admin']);
        // $admin->givePermissionTo('index menus');

        $superadmin = Role::create(['name' => 'superadmin']);

        // create superadmin
        $user = \App\Models\User::factory()->create([
            'name' => 'Superadmin',
            'email' => 'super@test.com',
        ]);
        $user->assignRole($superadmin);

        // create admin
        $user = \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@test.com',
        ]);
        $user->assignRole($admin);

        // create member
        $user = \App\Models\User::factory()->create([
            'name' => 'Kasir 1',
            'email' => 'kasir@test.com',
        ]);
        $user->assignRole($member);
    }
}
