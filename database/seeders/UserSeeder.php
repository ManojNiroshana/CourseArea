<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            0 => [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'user_name' => 'admin',
                'password' => Hash::make('admin123'),
                'u_tp_id' => 1,
            ]
        ];
        foreach ($users as $user) {
            User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'user_name' => $user['user_name'],
                'password' => $user['password'],
                'u_tp_id' => $user['u_tp_id'],
            ]);
        }
    }
}
