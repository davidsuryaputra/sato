<?php

use Illuminate\Database\Seeder;

class item_categories_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('item_categories')->insert(
          [
            ['name' => 'material'],
            ['name' => 'asset'],
          ]
        );
    }
}
