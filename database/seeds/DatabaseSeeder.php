<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BaseTableSeeder::class);
        $this->command->info("Roles Table Seeded :)");
        $this->command->info("Showrooms Table Seeded :)");
        $this->command->info("Users Table Seeded :)");
        $this->command->info("Item Categories Table Seeded :)");
        $this->command->info("Items Table Seeded :)");
        $this->command->info("Bills Table Seeded :)");
        // $this->call(item_categories_table_seeder::class);
    }
}
