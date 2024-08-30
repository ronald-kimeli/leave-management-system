<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            DepartmentsTableSeeder::class,
            LeaveTypesTableSeeder::class,
            UsersTableSeeder::class,
            ApplyLeavesTableSeeder::class,
            ProductsTableSeeder::class,
            CategoriesTableSeeder::class
        ]);
    }
}
