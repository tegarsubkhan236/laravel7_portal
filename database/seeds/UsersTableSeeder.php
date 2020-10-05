<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nama' => 'admin',
                'username' => 'admin',
                'password' => 'admin',
                'alamat' => 'bandung',
                'email' => 'admin@gmail.com',
                'no_hp' => '089666288087',
                'level' => 1,
                'created_at' => '2020-10-04',
            ),
            1 => 
            array (
                'id' => 3,
                'nama' => 'Tegar Subkhan Fauzi',
                'username' => 'tegarsubkhan',
                'password' => '12345',
                'alamat' => 'bandung',
                'email' => 'tegarsfauzi@gmail.com',
                'no_hp' => '089666288087',
                'level' => 1,
                'created_at' => '2020-10-04',
            ),
            2 => 
            array (
                'id' => 4,
                'nama' => 'author',
                'username' => 'author',
                'password' => 'author',
                'alamat' => 'bandung',
                'email' => 'asd@gmail.com',
                'no_hp' => '01231231212',
                'level' => 2,
                'created_at' => '2020-10-05',
            ),
        ));
        
        
    }
}