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
          ['id' => 3, 'name' => 'cashier'],
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
              'email' => 'cashier@sato.co.id',
              'password' => bcrypt('123456789'),
              'name'  => 'Mr. Cashier',
              'address' => 'JL. Sato Cashier',
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
              'name' => 'Aktiva Tetap',
            ],
            [
              'id' => 2,
              // 'name' => 'material',
              'name' => 'Cuci Mobil',
            ],
            [
              'id' => 3,
              // 'name' => 'asset',
              'name' => 'Car Treatment',
            ],
            [
              'id' => 4,
              // 'name' => 'pricing',
              'name' => 'Paint Protection',
            ],
            [
              'id' => 5,
              'name' => 'Aksesoris',
            ],
            [
              'id' => 6,
              'name' => 'Makanan',
            ],
            [
              'id' => 7,
              'name' => 'Minuman',
            ],


        ]);

        //ItemsTableSeeder
        DB::table('items')->insert([
            [
              'id' => 1,
              'showroom_id' => 1,
              'item_category_id' => 1,
              'name' => "Kompresor Gudang",
              'stock' => null,
              'stockable' => 0,
              'value' => 2500000,
            ],
            [
              'id' => 2,
              'showroom_id' => 1,
              'item_category_id' => 2,
              'name' => "Cuci Mobil Hidrolik Kecil",
              'stock' => null,
              'stockable' => 0,
              'value' => 45000,
            ],
            [
              'id' => 3,
              'showroom_id' => 1,
              'item_category_id' => 2,
              'name' => "Cuci Mobil Robotic Kecil",
              'stock' => null,
              'stockable' => 0,
              'value' => 60000,
            ],
            [
              'id' => 4,
              'showroom_id' => 1,
              'item_category_id' => 3,
              'name' => "Car Treatment Wax Kecil",
              'stock' => null,
              'stockable' => 0,
              'value' => 150000,
            ],
            [
              'id' => 5,
              'showroom_id' => 1,
              'item_category_id' => 3,
              'name' => "Car Treatment Interior Kecil",
              'stock' => null,
              'stockable' => 0,
              'value' => 250000,
            ],
            [
              'id' => 6,
              'showroom_id' => 1,
              'item_category_id' => 3,
              'name' => "Car Treatment Eksterior Kecil",
              'stock' => null,
              'stockable' => 0,
              'value' => 300000,
            ],
            [
              'id' => 7,
              'showroom_id' => 1,
              'item_category_id' => 3,
              'name' => "Car Treatment Perawatan Mesin Kecil",
              'stock' => null,
              'stockable' => 0,
              'value' => 200000,
            ],
            [
              'id' => 8,
              'showroom_id' => 1,
              'item_category_id' => 3,
              'name' => "Car Treatment Glass Cleaning Kecil",
              'stock' => null,
              'stockable' => 0,
              'value' => 150000,
            ],
            [
              'id' => 9,
              'showroom_id' => 1,
              'item_category_id' => 3,
              'name' => "Car Treatment Full Paket Kecil",
              'stock' => null,
              'stockable' => 0,
              'value' => 800000,
            ],
            [
              'id' => 10,
              'showroom_id' => 1,
              'item_category_id' => 4,
              'name' => "Paint Protection Silika Kecil",
              'stock' => null,
              'stockable' => 0,
              'value' => 1000000,
            ],
            [
              'id' => 11,
              'showroom_id' => 1,
              'item_category_id' => 4,
              'name' => "Paint Protection Kuarsa Kecil",
              'stock' => null,
              'stockable' => 0,
              'value' => 3000000,
            ],
            [
              'id' => 12,
              'showroom_id' => 1,
              'item_category_id' => 4,
              'name' => "Paint Protection Kristal Kecil",
              'stock' => null,
              'stockable' => 0,
              'value' => 5000000,
            ],

            [
              'id' => 13,
              'showroom_id' => 1,
              'item_category_id' => 5,
              'name' => "Parfum Mobil",
              'stock' => 3,
              'stockable' => 1,
              'value' => 5000,
            ],
            [
              'id' => 14,
              'showroom_id' => 1,
              'item_category_id' => 5,
              'name' => "Kanebo",
              'stock' => 5,
              'stockable' => 1,
              'value' => 10000,
            ],
            [
              'id' => 15,
              'showroom_id' => 1,
              'item_category_id' => 5,
              'name' => "Shampoo",
              'stock' => 5,
              'stockable' => 1,
              'value' => 7000,
            ],
            [
              'id' => 16,
              'showroom_id' => 1,
              'item_category_id' => 5,
              'name' => "Air Freshener",
              'stock' => 5,
              'stockable' => 1,
              'value' => 25000,
            ],
            [
              'id' => 17,
              'showroom_id' => 1,
              'item_category_id' => 6,
              'name' => "Gado-Gado",
              'stock' => null,
              'stockable' => 0,
              'value' => 0,
            ],
            [
              'id' => 18,
              'showroom_id' => 1,
              'item_category_id' => 7,
              'name' => "Bir",
              'stock' => 20,
              'stockable' => 1,
              'value' => 30000,
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
