<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@mail.com',
                'password' => bcrypt('12345678'),
                'role' => '1',
            ],
            [
                'name' => 'Guest',
                'email' => 'guest@mail.com',
                'password' => bcrypt('12345678'),
                'role' => '0',
            ],
        ];

        \DB::table('users')->insert($users);
    }
}
