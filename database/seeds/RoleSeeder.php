<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new \App\Models\Role();
        $role->name = 'admin';
        $role->description = 'Cuenta administrador';
        $role->save();

        $role = new \App\Models\Role();
        $role->name = 'user';
        $role->description = 'Cuenta usuario';
        $role->save();
    }
}
