<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::Truncate();
        Role::Truncate();
        User::Truncate();

        $adminRole = Role::create(['name' => 'Admin', 'display_name' => 'Admin']);
        $writerRole = Role::create(['name' => 'Writer', 'display_name' => 'Writer']);

        $viewPostsPermission = Permission::create(['name' => 'View posts', 'display_name' => 'View posts']);
        $createPostsPermission = Permission::create(['name' => 'Create posts', 'display_name' => 'Create posts']);
        $updatePostsPermission = Permission::create(['name' => 'Update posts', 'display_name' => 'Update posts']);
        $deletePostsPermission = Permission::create(['name' => 'Delete posts', 'display_name' => 'Delete posts']);

        $viewUsersPermission = Permission::create(['name' => 'View users', 'display_name' => 'View users']);
        $createUsersPermission = Permission::create(['name' => 'Create users', 'display_name' => 'Create users']);
        $updateUsersPermission = Permission::create(['name' => 'Update users', 'display_name' => 'Update users']);
        $deleteUsersPermission = Permission::create(['name' => 'Delete users', 'display_name' => 'Delete users']);

        $viewRolesPermission = Permission::create(['name' => 'View roles', 'display_name' => 'View roles']);
        $createRolesPermission = Permission::create(['name' => 'Create roles', 'display_name' => 'Create roles']);
        $updateRolesPermission = Permission::create(['name' => 'Update roles', 'display_name' => 'Update roles']);
        $deleteRolesPermission = Permission::create(['name' => 'Delete roles', 'display_name' => 'Delete roles']);

        $admin = new User;
        $admin->name = 'Admin';
        $admin->email = 'admin@admin.com';
        $admin->password = 'admin1234';
        $admin->save();

        $admin->assignRole($adminRole);

        $writer = new User;
        $writer->name = 'Luis';
        $writer->email = 'luis@luis.com';
        $writer->password = 'luis1234';
        $writer->save();

        $writer->assignRole($writerRole);

    }
}
