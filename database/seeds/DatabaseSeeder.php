<?php

use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        $this->call(ProviderSeeder::class);
//        $this->call(SpareSeeder::class);
//        $this->call(ClientSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);

    }
}
