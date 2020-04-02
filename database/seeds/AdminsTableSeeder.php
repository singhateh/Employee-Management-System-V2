<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
           'created_at' => \Carbon\Carbon::now(),
           'username' => 'admin',
            'image' => '',
            'first_name' => 'alagie',
            'last_name' => 'singhateh',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'status' => '1',
        ]);
    }
}
