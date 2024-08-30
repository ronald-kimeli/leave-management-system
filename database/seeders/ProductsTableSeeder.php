<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'pain',
                'description' => 'gaming',
                'price' => 'allowed',
                'quantity' => 'by',
                'created_at' => '2022-04-18 07:55:50',
                'updated_at' => '2022-04-18 11:00:35',
            ],
            [
                'name' => 'Kimbo',
                'description' => null, // NULL value
                'price' => '200',
                'quantity' => 'Kilograms',
                'created_at' => '2022-04-18 08:08:38',
                'updated_at' => '2022-04-18 08:08:38',
            ],
            [
                'name' => 'Toilex',
                'description' => 'New Look',
                'price' => '200',
                'quantity' => 'grams',
                'created_at' => '2022-04-20 18:26:22',
                'updated_at' => '2022-05-04 15:30:51',
            ],
            [
                'name' => 'Ps4',
                'description' => 'Gaming Device',
                'price' => '35000',
                'quantity' => 'kgs',
                'created_at' => '2022-05-04 15:18:22',
                'updated_at' => '2022-05-04 15:18:22',
            ],
        ]);

    }
}
