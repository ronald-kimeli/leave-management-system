<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LeaveTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('leavetypes')->insert([
            [
                'id' => 1,
                'leave_type' => 'Maternity Leave',
                'status' => 1,
                'created_at' => null,
                'updated_at' => '2022-05-10 16:27:24',
            ],
            [
                'id' => 2,
                'leave_type' => 'Study',
                'status' => 1,
                'created_at' => null,
                'updated_at' => '2022-05-03 06:32:50',
            ],
            [
                'id' => 3,
                'leave_type' => 'Paternity',
                'status' => 1,
                'created_at' => '2022-04-18 05:08:38',
                'updated_at' => '2022-05-03 06:33:10',
            ],
            [
                'id' => 4,
                'leave_type' => 'Sabbatical',
                'status' => 0,
                'created_at' => '2022-04-28 14:57:47',
                'updated_at' => '2022-05-10 10:20:03',
            ],
            [
                'id' => 5,
                'leave_type' => 'Special',
                'status' => 0,
                'created_at' => '2022-04-28 15:12:45',
                'updated_at' => '2022-05-03 07:15:34',
            ],
        ]);

    }
}
