<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesandPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name'              => 'Administrator',
            'email'             => 'admin@email.com',
            'password'          => bcrypt('password'),
            'email_verified_at' => now()
        ]);

        $user1 = User::create([
            'name'              => 'Game Manager',
            'email'             => 'gamemanager@email.com',
            'password'          => bcrypt('password'),
            'email_verified_at' => now()
        ]);

        //Roles
        $admin          = Role::create(['name'  => 'administrator']);
        $manager        = Role::create(['name'  => 'manager']);
        $customer       = Role::create(['name'  => 'client_user']);

        //Permissions
        Permission::create(['name'  => 'see-logs']);
        Permission::create(['name'  => 'manage-games']);
        Permission::create(['name'  => 'buy-games']);

        //Permission assignment to role
        $admin->givePermissionTo('see-logs');
        $manager->givePermissionTo('manage-games');
        $customer->givePermissionTo('buy-games');

        //Role assignment to user
        $user->assignRole($admin);
        $user1->assignRole($manager);
    }
}
