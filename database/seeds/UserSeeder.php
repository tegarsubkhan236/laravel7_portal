<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        DB::table('users')->insert([
            'nama' => "admin",
            'username' => "admin",
            'alamat' => "bandung",
            'no_hp' => "089666288087",
            'email' =>  'admin@gmail.com',
            'password' => 'admin',
            'created_at' => date("Y-m-d"),
            'level' => 1,
        ]);
    }
}
