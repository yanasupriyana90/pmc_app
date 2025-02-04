<?php

namespace Database\Seeders;

use App\Models\Barang;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $createMultipleBarang = [
            [
                'kode_barang' => 'HD-7-00001',
                'nama' => 'HANDLEBAR RISER',
                'kategori_barang_id' => '17',
                'merk' => 'HC MOTORKU',
                'panjang' => 31,
                'lebar' => 10,
                'tinggi' => 9,
                'satuan_barang_id' => 1,
                'desk' => '',
                'image' => '',
                'harga_modal_usd' => 50.4,
                'exchange' => 16300,
                'harga_modal_idr' => 821520,
                'harga_jual' => 0,
                'stock' => 0,
                'min_stock' => 3,
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
                ],

                [
                'kode_barang' => 'HD-7-00002',
                'nama' => 'HANDLEBARS',
                'kategori_barang_id' => '17',
                'merk' => 'HC MOTORKU',
                'panjang' => 81,
                'lebar' => 40,
                'tinggi' => 21,
                'satuan_barang_id' => 1,
                'desk' => '',
                'image' => '',
                'harga_modal_usd' => 46.2,
                'exchange' => 16300,
                'harga_modal_idr' => 753060,
                'harga_jual' => 0,
                'stock' => 0,
                'min_stock' => 3,
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
                ],

                [
                'kode_barang' => 'HD-7-00003',
                'nama' => 'HANDLEBARS',
                'kategori_barang_id' => '17',
                'merk' => 'HC MOTORKU',
                'panjang' => 81,
                'lebar' => 40,
                'tinggi' => 21,
                'satuan_barang_id' => 1,
                'desk' => '',
                'image' => '',
                'harga_modal_usd' => 46.2,
                'exchange' => 16300,
                'harga_modal_idr' => 753060,
                'harga_jual' => 0,
                'stock' => 0,
                'min_stock' => 3,
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
                ],

                [
                'kode_barang' => 'HD-7-00004',
                'nama' => 'RISER CLAMPS',
                'kategori_barang_id' => '5',
                'merk' => 'HC MOTORKU',
                'panjang' => 9,
                'lebar' => 9,
                'tinggi' => 8,
                'satuan_barang_id' => 1,
                'desk' => '',
                'image' => '',
                'harga_modal_usd' => 12.6,
                'exchange' => 16300,
                'harga_modal_idr' => 205380,
                'harga_jual' => 0,
                'stock' => 0,
                'min_stock' => 3,
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
                ],

        ];
        Barang::insert($createMultipleBarang);
    }
}
