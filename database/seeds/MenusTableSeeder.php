<?php

use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('menus')->delete();
        
        \DB::table('menus')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Home',
                'link' => NULL,
                'is_blank' => 0,
                'page_id' => 1,
                'parent_id' => NULL,
                'position' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Laporan',
                'link' => '#',
                'is_blank' => 0,
                'page_id' => NULL,
                'parent_id' => NULL,
                'position' => 2,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Keuangan',
                'link' => 'keuangan',
                'is_blank' => 1,
                'page_id' => NULL,
                'parent_id' => 2,
                'position' => 1,
            ),
        ));
        
        
    }
}