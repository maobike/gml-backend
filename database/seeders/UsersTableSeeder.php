<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        $users = [
            [
                'first_name' => 'Usuario',
                'last_name' => '1',
                'dni' => '11111111',
                'email' => 'usuario1@gmail.com',
                'country' => 'Colombia',
                'address' => 'Calle 1 # 1-1',
                'phone' => '3101111111',
                'password' => '$2y$10$KoWWGckZMgth1najXRFLcOLZRQh5rlOnHGu5zN8LdhjkfvCqUTWO.', //123456789,
                'created_at' => $now,
                'category_id' => 1
            ],
            [
                'first_name' => 'Usuario',
                'last_name' => '2',
                'dni' => '22222222',
                'email' => 'usuario2@gmail.com',
                'country' => 'Colombia',
                'address' => 'Calle 2 # 2-2',
                'phone' => '3102222222',
                'password' => '$2y$10$KoWWGckZMgth1najXRFLcOLZRQh5rlOnHGu5zN8LdhjkfvCqUTWO.', //123456789,
                'created_at' => $now,
                'category_id' => 2
            ],
            [
                'first_name' => 'Usuario',
                'last_name' => '3',
                'dni' => '33333333',
                'email' => 'usuario3@gmail.com',
                'country' => 'Colombia',
                'address' => 'Calle 3 # 3-3',
                'phone' => '310333333',
                'password' => '$2y$10$KoWWGckZMgth1najXRFLcOLZRQh5rlOnHGu5zN8LdhjkfvCqUTWO.', //123456789,
                'created_at' => $now,
                'category_id' => 3
            ],
        ];

        User::insert($users);
    }
}
