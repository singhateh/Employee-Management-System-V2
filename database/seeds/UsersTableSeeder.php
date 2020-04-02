<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'created_at' => \Carbon\Carbon::now(),
                'username' => 'employee',
                'image' => '',
                'first_name' => 'badoo',
                'last_name' => 'singhateh',
                'role' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin'),
                'status' => '1',
                'phone' => '+62081290348080',
                'address' => 'ciputat',
                'gender' => 'male',
                'dob' => '1997-6-12',
                'join_date' => '2020-03-17',
                'job_type' => 'manager',
                'city' => 'tangarang',
                'age' => '50',
            ],
            [
                'created_at' => \Carbon\Carbon::now(),
                'username' => 'omz',
                'image' => '',
                'first_name' => 'omar',
                'last_name' => 'samba',
                'role' => 'employee',
                'email' => 'samba@gmail.com',
                'password' => bcrypt('employee'),
                'status' => '1',
                'phone' => '+22049033498',
                'address' => 'jalan jambu',
                'gender' => 'male',
                'dob' => '1990-3-12',
                'join_date' => '2020-03-17',
                'job_type' => 'IT',
                'city' => 'ciputat',
                'age' => '35',
            ],

            [
                'created_at' => \Carbon\Carbon::now(),
                'username' => 'mafeh',
                'image' => '',
                'first_name' => 'abdou',
                'last_name' => 'barrow',
                'role' => 'admin',
                'email' => 'barrow@gmail.com',
                'password' => bcrypt('admin'),
                'status' => '1',
                'phone' => '+628055787858',
                'address' => 'mahad',
                'gender' => 'male',
                'dob' => '1990-3-06',
                'join_date' => '2020-03-12',
                'job_type' => 'Developer',
                'city' => 'jkt',
                'age' => '59',
            ],

            [
                'created_at' => \Carbon\Carbon::now(),
                'username' => 'mass',
                'image' => '',
                'first_name' => 'mam mass',
                'last_name' => 'sey',
                'role' => 'employee',
                'email' => 'mass@gmail.com',
                'password' => bcrypt('employee'),
                'status' => '1',
                'phone' => '+290598559856',
                'address' => 'jalan murtada',
                'gender' => 'male',
                'dob' => '1996-03-12',
                'join_date' => '2020-03-12',
                'job_type' => 'Developer',
                'city' => 'bandung',
                'age' => '25',
            ],

            [
                'created_at' => \Carbon\Carbon::now(),
                'username' => 'tima',
                'image' => '',
                'first_name' => 'fatou',
                'last_name' => 'jallow',
                'role' => 'employee',
                'email' => 'jallow@gmail.com',
                'password' => bcrypt('employee'),
                'status' => '1',
                'phone' => '+32398434895',
                'address' => 'campus 2',
                'gender' => 'female',
                'dob' => '1938-03-12',
                'join_date' => '2020-03-12',
                'job_type' => 'designer',
                'city' => 'jogjakarta',
                'age' => '18',
            ],
        ]);
    }
}
