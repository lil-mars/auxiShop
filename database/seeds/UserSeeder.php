<?php

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
        \App\User::create(
            [
                'name' => 'Jose',
                'last_name' => 'Perez',
                'email' => 'admin@example.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role_id' => '1',
            ]
        );
        \App\User::create(
            [
                'name' => 'Maria Tatiana',
                'last_name' => 'Perez Reyes',
                'email' => 'user@example.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role_id' => '2',
            ]
        );
        factory(\App\User::class, 5)->create();
    }
}
