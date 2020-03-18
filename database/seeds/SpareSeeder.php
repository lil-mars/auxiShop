<?php

use Illuminate\Database\Seeder;

class SpareSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Category::class, 5)->create();
        factory(\App\Models\Brand::class, 5)->create();
        factory(\App\Models\CarLine::class, 5 )->create();
        factory(\App\Models\Spare::class, 100)->create();
    }
}
