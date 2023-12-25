<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_user =  Role::updateOrCreate(
            [
                'name' => 'user'
            ],
            [
                'name' => 'user'
            ]
        );
        $role_admin = Role::updateOrCreate(
            [
            'name' => 'admin'
            ],
            [
                'name' => 'admin'
            ]
        );
        $permission =  Permission::updateOrCreate(
            [
                'name' => 'view_dashboard'
            ],
            [
                'name' => 'view_dashboard'
            ]
        );
        $permission2 =  Permission::updateOrCreate(
            [
                'name' => 'view_product'
            ],
            [
                'name' => 'view_product'
            ]
        );
        $permission3 =  Permission::updateOrCreate(
            [
                'name' => 'view_listproduct'
            ],
            [
                'name' => 'view_listproduct'
            ]
        );
        $permission4 =  Permission::updateOrCreate(
            [
                'name' => 'view_category'
            ],
            [
                'name' => 'view_category'
            ]
        );


        $role_admin->givePermissionTo($permission);
        $role_admin->givePermissionTo($permission2);
        $role_admin->givePermissionTo($permission3);
        $role_admin->givePermissionTo($permission4);

        $role_user->givePermissionTo($permission3);

        $user = User::find(1);
        $user->assignRole('admin');

        $user2 = User::find(2);
        $user2->assignRole('user');
    }
}
