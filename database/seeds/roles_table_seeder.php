<?php

use Illuminate\Database\Seeder;

class roles_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert(
          [
            ['name' => 'owner'],
            ['name' => 'manager'],
            ['name' => 'accountant'],
            ['name' => 'operator'],
            ['name' => 'client'],
          ]
        );
    }
}
