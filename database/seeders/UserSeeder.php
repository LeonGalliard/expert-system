<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Code Lama
        // $user = new User();
        // $user->username = "admin";
        // $user->name = "admin";
        // $user->level = "super_admin";
        // $user->password = bcrypt('12345');
        // $user->save();

        // $user = new User();
        // $user->username = "pakar";
        // $user->name = "pakar";
        // $user->level = "admin";
        // $user->password = bcrypt('12345');
        // $user->save();

        // Super Admin
        $user = new User();
        $user->username = "admin";
        $user->level = "superAdmin"; // sesuaikan enum di migration
        $user->password = bcrypt('12345'); // bcrypt password
        $user->save();

        // Admin / Pakar
        $user = new User();
        $user->username = "pakar";
        $user->level = "admin"; // sesuai enum
        $user->password = bcrypt('12345'); // bcrypt password
        $user->save();
    }
}
