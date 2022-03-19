<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::Truncate();

        $user = new User;
        $user->name = 'Admin';
        $user->email = 'admin@admin.com';
        $user->password = bcrypt('admin1234');
        $user->save();

    }
}
