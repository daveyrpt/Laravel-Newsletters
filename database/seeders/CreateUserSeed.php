<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User; // 1001 add


class CreateUserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1001 add
        $users = [
            ['name'=>'User',
            'email' => 'user@cambotutorial.com',
            'password' => bcrypt('user1234'),
            'role' => 0
            ],
            ['name'=>'Editor',
            'email' => 'editor@cambotutorial.com',
            'password' => bcrypt('editor1234'),
            'role' => 1
            ],
            ['name'=>'Admin',
            'email' => 'admin@cambotutorial.com',
            'password' => bcrypt('admin1234'),
            'role' => 2
            ]
        ];
        foreach($users as $user)
        {
            User::create($user);
        }
    }
}
