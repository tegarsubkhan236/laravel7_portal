<?php

use Illuminate\Database\Seeder;

class AnnouncementsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('announcements')->delete();
        
        \DB::table('announcements')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Contoh Pengumuman',
                'cover' => NULL,
                'contents' => 'aasasa',
                'files' => NULL,
                'created_at' => '2020-10-09',
                'updated_at' => '2020-10-09',
            ),
        ));
        
        
    }
}