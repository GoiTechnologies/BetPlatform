<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = new User();
        $user->name = "admin";
        $user->email = "admin@admin.com";
        $user->role_id = 1;
        $user->total_credits = 999;
        $user->password = Hash::make('admin');

        $user->save();

        $user = new User();
        $user->name = "prueba";
        $user->email = "prueba@prueba.com";
        $user->role_id = 2;
        $user->total_credits = 100;
        $user->password = Hash::make('prueba');

        $user->save();
    }
}
