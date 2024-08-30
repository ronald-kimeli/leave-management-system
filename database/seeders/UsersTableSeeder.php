<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
                'name' => 'Admin',
                'last_name' => 'Pro',
                'gender' => 'Female',
                'phone' => '26243200',
                'email' => 'admin@gmail.com',
                'department_id' => 2,
                'email_verified_at' => null, 
                'password' => bcrypt('12345678'), 
                'remember_token' => null, 
                'created_at' => '2022-03-25 16:10:11',
                'updated_at' => '2022-04-30 08:34:48',
                'role_as' => 1,
            ],
            [
                'name' => 'John',
                'last_name' => 'Doe',
                'gender' => 'Male',
                'phone' => '999999',
                'email' => 'user@gmail.com',
                'department_id' => 2,
                'email_verified_at' => null, 
                'password' => bcrypt('12345678'), 
                'remember_token' => null, 
                'created_at' => '2022-03-28 05:44:23',
                'updated_at' => '2022-04-30 16:47:33',
                'role_as' => 0,
            ]
        ]); 
    }
}
