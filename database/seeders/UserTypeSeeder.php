<?php

namespace Database\Seeders;

use App\Models\UserType;
use Illuminate\Database\Seeder;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_types = [
            0 => [
                'user_type_code' => 'AD',
                'user_type_name' => 'Admin',
            ],
            1 => [
                'user_type_code' => 'ST',
                'user_type_name' => 'Student',
            ]
        ];
        foreach ($user_types as $user_type) {
            UserType::create([
                'user_type_code' => $user_type['user_type_code'],
                'user_type_name' => $user_type['user_type_name'],
            ]);
        }
    }
}
