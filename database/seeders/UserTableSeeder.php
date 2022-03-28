<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserTableSeeder extends Seeder
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

        $adminRole = Role::create(['name' => 'Admin']);
        $writerRole = Role::create(['name' => 'Writer']);

        $viewPostsPermission = Permission::create(['name' => 'View posts']);
        $createPostsPermission = Permission::create(['name' => 'Create posts']);
        $updatePostsPermission = Permission::create(['name' => 'Update posts']);
        $deletePostsPermission = Permission::create(['name' => 'Delete posts']);

        $viewUsersPermission = Permission::create(['name' => 'View users']);
        $createUsersPermission = Permission::create(['name' => 'Create users']);
        $updateUsersPermission = Permission::create(['name' => 'Update users']);
        $deleteUsersPermission = Permission::create(['name' => 'Delete users']);

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
