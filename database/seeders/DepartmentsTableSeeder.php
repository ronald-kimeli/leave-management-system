<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
            [
                'id' => 1,
                'dpname' => 'Aeroneuticals',
                'status' => 1,
                'description' => 'Department focused on aeronautical engineering.',
                'created_at' => null,
                'updated_at' => '2022-05-10 11:08:11',
            ],
            [
                'id' => 2,
                'dpname' => 'ICT',
                'status' => 1,
                'description' => 'Department responsible for information and communication technology.',
                'created_at' => null,
                'updated_at' => '2022-05-10 10:07:35',
            ],
            [
                'id' => 3,
                'dpname' => 'Geography',
                'status' => 0,
                'description' => 'Department focusing on the study of the Earth\'s surface.',
                'created_at' => '2022-03-28 06:08:32',
                'updated_at' => '2022-05-10 10:07:22',
            ],
            [
                'id' => 4,
                'dpname' => 'Agricultural',
                'status' => 1,
                'description' => 'Department focused on agricultural sciences and farming practices.',
                'created_at' => '2022-04-30 13:28:30',
                'updated_at' => '2022-05-10 16:26:08',
            ],
        ]);
        
    }
}
