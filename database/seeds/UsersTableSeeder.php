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
                'nis' => NULL,
                'level' => 1,
                'created_at' => '2020-10-04',
                'updated_at' => NULL,
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
                'nis' => NULL,
                'level' => 1,
                'created_at' => '2020-10-04',
                'updated_at' => NULL,
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
                'nis' => NULL,
                'level' => 2,
                'created_at' => '2020-10-05',
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 5,
                'nama' => 'keuangan',
                'username' => 'keuangan',
                'password' => 'keuangan',
                'alamat' => 'bandung',
                'email' => 'keuangan@gmail.com',
                'no_hp' => '089666288087',
                'nis' => NULL,
                'level' => 4,
                'created_at' => '2020-10-05',
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 6,
                'nama' => 'qwerty',
                'username' => 'qwerty',
                'password' => 'qwerty',
                'alamat' => 'qwerty',
                'email' => 'qwerty@gmail.com',
                'no_hp' => '123456',
                'nis' => NULL,
                'level' => 4,
                'created_at' => '2020-10-10',
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}