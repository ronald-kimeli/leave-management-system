<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'Maternity Leave',
                'slug' => 'maternity-for-gaming',
                'description' => 'ajdakml;/',
                'image' => '1648323941.jpg',
                'meta_title' => 'axsadsgfh',
                'meta_description' => 'xdefrgfgh',
                'meta_keyword' => 'DWFETRHSDZ',
                'navbar_status' => 0,
                'status' => 1,
                'created_by' => 3,
                'created_at' => '2022-03-26 16:45:41',
                'updated_at' => '2022-03-26 16:45:41',
            ],
        ]);
    }
}
