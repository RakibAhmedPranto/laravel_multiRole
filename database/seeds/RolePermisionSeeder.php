<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create Roles
        $roleSuperAdmin = Role::create(['name' => 'superadmin']);
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleEditor = Role::create(['name' => 'editor']);
        $roleUser = Role::create(['name' => 'user']);
        //Permission List as array
        $permissions = [
            'blog.create',
            'blog.view',
            'blog.delete',
            'blog.edit',
            'blog.approve',

            'admin.create',
            'admin.view',
            'admin.delete',
            'admin.edit',

            'role.create',
            'role.view',
            'role.delete',
            'role.edit',

            'profile.view',
            'profile.edit',

            'dashboard.view'
        ];

        //assign permission

        for($i=0; $i< count($permissions);$i++){
            $permission = Permission::create(['name' => $permissions[$i]]);
            $roleSuperAdmin->givePermissionTo($permission);
            $permission->assignRole($roleSuperAdmin);
        }
    }
}
