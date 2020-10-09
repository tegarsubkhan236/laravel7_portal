<?php

use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('pages')->delete();
        
        \DB::table('pages')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'pages',
                'slug' => 'pges-clah',
                'contents' => 'sadasd',
                'is_commented' => 0,
                'created_at' => '2020-10-09',
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}