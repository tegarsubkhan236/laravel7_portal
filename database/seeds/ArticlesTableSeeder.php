<?php

use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('articles')->delete();
        
        \DB::table('articles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'category_id' => 1,
                'title' => 'asas',
                'cover' => NULL,
                'contents' => 'asdsad',
                'files' => NULL,
                'created_at' => '2020-10-09',
                'updated_at' => '2020-10-09',
            ),
        ));
        
        
    }
}