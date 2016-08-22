<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Schema\Blueprint;

class BaseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //RolesTableSeeder
        DB::table('roles')->insert([
          ['id' => 1, 'name' => 'owner'],
          ['id' => 2, 'name' => 'manager'],
          ['id' => 3, 'name' => 'accountant'],
          ['id' => 4, 'name' => 'operator'],
          ['id' => 5, 'name' => 'client'],
        ]);

        //ShowroomsTableSeeder
        DB::table('showrooms')->insert([
          [
            'id' => 1,
            'name' => 'Showroom Klampis 1',
            'address' => 'JL. Klampis 1',
            'city' => 'Surabaya',
            'phone' => '031111555',
            'balance' => '1000000'
          ],
          [
            'id' => 2,
            'name' => 'Showroom Klampis 2',
            'address' => 'JL. Klampis 2',
            'city' => 'Surabaya',
            'phone' => '031222555',
            'balance' => '2000000'
          ],
          [
            'id' => 3,
            'name' => 'Showroom Ngagel 1',
            'address' => 'JL. Ngagel 477',
            'city' => 'Surabaya',
            'phone' => '031222555',
            'balance' => '1500000'
          ],
        ]);

        //UsersTableSeeder
        DB::table('users')->insert([
            [
              'id'  => 1,
              'email' => 'owner@sato.co.id',
              'password' => bcrypt('123456789'),
              'name'  => 'Mas Moel',
              'address' => 'JL. Sato',
              'city' => 'Gresik',
              'phone' => '085700000000',
              'no_kendaraan' => null,
              'showroom_id' => null,
              'role_id' => '1',
              'balance' => '500000',
              'created_at' => '2016-06-18 22:02:29',
            ],
            [
              'id'  => 2,
              'email' => 'manager@sato.co.id',
              'password' => bcrypt('123456789'),
              'name'  => 'Mr. Kika Manager',
              'address' => 'JL. Sato Rio Manager',
              'city' => 'Gresik',
              'phone' => '085700000000',
              'no_kendaraan' => null,
              'showroom_id' => 1,
              'role_id' => '2',
              'balance' => '5000000',
              'created_at' => '2016-06-18 22:02:29',
            ],
            [
              'id'  => 3,
              'email' => 'accountant@sato.co.id',
              'password' => bcrypt('123456789'),
              'name'  => 'Mr. Accountant',
              'address' => 'JL. Sato Akunting',
              'city' => 'Gresik',
              'phone' => '085700000000',
              'no_kendaraan' => null,
              'showroom_id' => 1,
              'role_id' => '3',
              'balance' => '4050000',
              'created_at' => '2016-06-18 22:02:29',
            ],
            [
              'id'  => 4,
              'email' => 'operator@sato.co.id',
              'password' => bcrypt('123456789'),
              'name'  => 'Mr. Operator',
              'address' => 'JL. Sato Operator',
              'city' => 'Gresik',
              'phone' => '085700000000',
              'no_kendaraan' => null,
              'showroom_id' => 1,
              'role_id' => '4',
              'balance' => '750000',
              'created_at' => '2016-06-18 22:02:29',
            ],
            [
              'id'  => 5,
              'email' => 'client1@sato.co.id',
              'password' => bcrypt('123456789'),
              'name'  => 'Adi Suryanto',
              'address' => 'JL. Sato Client 1',
              'city' => 'Bekasi',
              'phone' => '085700000000',
              'no_kendaraan' => 'L 1234 XY',
              'showroom_id' => 1,
              'role_id' => '5',
              'balance' => '60000',
              'created_at' => '2016-06-18 22:02:29',
            ],
            [
              'id'  => 6,
              'email' => 'client2@sato.co.id',
              'password' => bcrypt('123456789'),
              'name'  => 'Catur Indriyani',
              'address' => 'JL. Sato Client 2',
              'city' => 'Bogor',
              'phone' => '085700000000',
              'no_kendaraan' => 'L 1674 XY',
              'showroom_id' => 1,
              'role_id' => '5',
              'balance' => '60000',
              'created_at' => '2016-06-18 22:02:29',
            ],
            [
              'id'  => 7,
              'email' => 'client3@sato.co.id',
              'password' => bcrypt('123456789'),
              'name'  => 'Rizky Sugiarto',
              'address' => 'JL. Sato Client 3',
              'city' => 'Jakarta',
              'phone' => '085700000000',
              'no_kendaraan' => 'AG 4434 XY',
              'showroom_id' => 1,
              'role_id' => '5',
              'balance' => '60000',
              'created_at' => '2016-06-18 22:02:29',
            ],
            [
              'id'  => 8,
              'email' => 'client4@sato.co.id',
              'password' => bcrypt('123456789'),
              'name'  => 'Retno Saputri',
              'address' => 'JL. Sato Client 4',
              'city' => 'Gresik',
              'phone' => '085700000000',
              'no_kendaraan' => 'H 4545 XY',
              'showroom_id' => 1,
              'role_id' => '5',
              'balance' => '60000',
              'created_at' => '2016-06-18 22:02:29',
            ],
            [
              'id'  => 9,
              'email' => 'client5@sato.co.id',
              'password' => bcrypt('123456789'),
              'name'  => 'Putut Wahyudi',
              'address' => 'JL. Sato Client 5',
              'city' => 'Surabaya',
              'phone' => '085700000000',
              'no_kendaraan' => 'H 5678 XY',
              'showroom_id' => 1,
              'role_id' => '5',
              'balance' => '60000',
              'created_at' => '2016-06-18 22:02:29',
            ],

        ]);

        //ItemCategoriesTableSeeder
        DB::table('item_categories')->insert([
            [
              'id' => 1,
              'name' => 'material',
            ],
            [
              'id' => 2,
              'name' => 'asset',
            ],
            [
              'id' => 3,
              'name' => 'pricing',
            ],
        ]);

        //ItemsTableSeeder
        DB::table('items')->insert([
            [
              'id' => 1,
              'showroom_id' => 1,
              'item_category_id' => 1,
              'name' => "Saboen Lipuboey",
              'stock' => 3,
              'value' => 5000,
            ],
            [
              'id' => 2,
              'showroom_id' => 1,
              'item_category_id' => 1,
              'name' => "Spon Pembersih Biasa",
              'stock' => 5,
              'value' => 2000,
            ],
            [
              'id' => 3,
              'showroom_id' => 1,
              'item_category_id' => 3,
              'name' => "Cuci Motor Kecil",
              'stock' => null,
              'value' => 7000,
            ],
            [
              'id' => 4,
              'showroom_id' => 1,
              'item_category_id' => 3,
              'name' => "Cuci Mobil Kecil",
              'stock' => null,
              'value' => 15000,
            ],
            [
              'id' => 5,
              'showroom_id' => 1,
              'item_category_id' => 3,
              'name' => "Cuci Mobil Besar",
              'stock' => null,
              'value' => 25000,
            ],
            [
              'id' => 6,
              'showroom_id' => 1,
              'item_category_id' => 2,
              'name' => "Meja Akunting",
              'stock' => null,
              'value' => 600000,
            ],
            [
              'id' => 7,
              'showroom_id' => 1,
              'item_category_id' => 2,
              'name' => "Kompresor Gudang",
              'stock' => null,
              'value' => 2500000,
            ],
        ]);

        //BillsTableSeeder
        DB::table('bills')->insert([
            [
              'id' => 1,
              'name' => 'Tagihan Internet Atas',
              'vendor' => 'Telkom Indonesia',
              'description' => 'Untuk kantor atas',
            ],
            [
              'id' => 2,
              'name' => 'Tagihan Internet Bawah',
              'vendor' => 'First Media',
              'description' => 'Untuk kantor bawah',
            ],
            [
              'id' => 3,
              'name' => 'Tagihan Listrik',
              'vendor' => 'PLN',
              'description' => 'Tagihan listrik untuk kantor klampis',
            ],
            [
              'id' => 4,
              'name' => 'Tagihan Air',
              'vendor' => 'PDAM',
              'description' => 'Tagihan air untuk kantor ngagel',
            ],
        ]);

    }
}
