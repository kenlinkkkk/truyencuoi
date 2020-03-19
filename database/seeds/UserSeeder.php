<?php

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
        $data = [
            [
                'name' => 'Admin',
                'email' => 'sadmin@gmail.com',
                'username' => 'sadmin',
                'password' => bcrypt('1234'),
                'status' => 1,
                'role' => 0,
            ],
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'username' => 'admin',
                'password' => bcrypt('1234'),
                'status' => 1,
                'role' => 1,
            ]
        ];

        User::insert($data);
    }
}
