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
                'name' => 'Demo',
                'email' => 'demo@321zeno.com',
                'password' => '$2y$10$mln5phHXQjo1sFNo/r0/AuokGoA/O9UUgfbY1VjBK5p5mxO0.p1..',
                'remember_token' => 'oC8mKtgRgQrnrQbVP3ipylmbqb65r79yZ1ekBD3Qeg6YMnsc3zFISQoDktBI',
                'created_at' => '2017-07-29 18:44:13',
                'updated_at' => '2017-07-29 18:44:13',
            ),
        ));
        
        
    }
}