<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ApplyLeavesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('applyleaves')->insert([
            [
                'user_id' => 1,
                'leave_type_id' => 1,
                'description' => 'Game season and Heading for gaming.',
                'leave_from' => '2022-04-09',
                'leave_to' => '2022-04-29',
                'status' => 1,
                'created_at' => '2022-03-26 16:11:06',
                'updated_at' => '2022-03-28 05:47:47',
            ],
            [
                'user_id' => 1,
                'leave_type_id' => 1,
                'description' => 'Heading for championship',
                'leave_from' => '2022-04-02',
                'leave_to' => '2022-04-30',
                'status' => 1,
                'created_at' => '2022-03-26 16:14:24',
                'updated_at' => '2022-03-27 18:27:54',
            ],
            [
                'user_id' => 1,
                'leave_type_id' => 1,
                'description' => 'Home controller',
                'leave_from' => '2022-05-11',
                'leave_to' => '2022-05-12',
                'status' => 1,
                'created_at' => '2022-03-26 16:35:45',
                'updated_at' => '2022-05-10 13:10:08',
            ],
            [
                'user_id' => 1,
                'leave_type_id' => 1,
                'description' => 'Emergency Issues',
                'leave_from' => '2022-05-14',
                'leave_to' => '2022-05-28',
                'status' => 1,
                'created_at' => '2022-03-26 16:43:14',
                'updated_at' => '2022-05-10 13:09:07',
            ],
        ]);
    }
}
