<?php

use Illuminate\Database\Seeder;

class users_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
          [
            [
              'email' => 'owner@sato.co.id',
              'password' => bcrypt('123456789'),
              'name'  => 'owner',
              'address' => 'JL. Sato',
              'city' => 'Gresik',
              'phone' => '085700000000',
              'showroom_id' => null,
              'role_id' => '1',
              'balance' => '500000',
              'created_at' => '2016-06-18 22:02:29',
            ],
            [
              'email' => 'manager@sato.co.id',
              'password' => bcrypt('123456789'),
              'name'  => 'manager',
              'address' => 'JL. Sato Manager',
              'city' => 'Gresik',
              'phone' => '085700000000',
              'showroom_id' => null,
              'role_id' => '2',
              'balance' => '5000000',
              'created_at' => '2016-06-18 22:02:29',
            ],
            [
              'email' => 'accountant@sato.co.id',
              'password' => bcrypt('123456789'),
              'name'  => 'accountant',
              'address' => 'JL. Sato Akunting',
              'city' => 'Gresik',
              'phone' => '085700000000',
              'showroom_id' => null,
              'role_id' => '3',
              'balance' => '4050000',
              'created_at' => '2016-06-18 22:02:29',
            ],
            [
              'email' => 'operator@sato.co.id',
              'password' => bcrypt('123456789'),
              'name'  => 'operator',
              'address' => 'JL. Sato Operator',
              'city' => 'Gresik',
              'phone' => '085700000000',
              'showroom_id' => null,
              'role_id' => '4',
              'balance' => '750000',
              'created_at' => '2016-06-18 22:02:29',
            ],
            [
              'email' => 'client@sato.co.id',
              'password' => bcrypt('123456789'),
              'name'  => 'Client',
              'address' => 'JL. Sato Client',
              'city' => 'Madura',
              'phone' => '085700000000',
              'showroom_id' => null,
              'role_id' => '5',
              'balance' => '60000',
              'created_at' => '2016-06-18 22:02:29',
            ]
          ]
      );
    }
}
