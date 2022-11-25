<?php

use Illuminate\Database\Seeder;
use App\User;

class AdminSeeder extends Seeder
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
                'name' => 'UA Admin',
                'email' => 'info@ua.com',
                'phone' => '09176775089',
                'dob' => '09/14/1990',
                'gender' => 'm',
                'username' => 'admin',
                'password' => bcrypt('admin123'),
                'role' => 0
            ]
        ];

        foreach($users as $user)
        {
            User::create($user);
        }
    }
}
