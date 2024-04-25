<?php

namespace Database\Seeders;
use App\Models\Permission;
use App\Models\Role;
use App\Models\RoleHasPermission;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'update-user-role',
            'create-user',
            'update-user',
            'list-user',
            'delete-user'
        ];

        $adminRoleId = Role::where('name', 'admin')->first()->id;
        foreach ($permissions as $permission) {
            $permissionId = Permission::where('name', $permission)->first()->id;
            RoleHasPermission::create([
                'permission_id' => $permissionId,
                'role_id' => $adminRoleId
            ]);
        }
    }
}
