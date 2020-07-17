<?php

use Illuminate\Database\Seeder;
use App\Role;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role = new Role();
        $role->name = "Admin";
        $role->save();

        $role = new Role();
        $role->name = "Prueba";
        $role->save();
    }
}
