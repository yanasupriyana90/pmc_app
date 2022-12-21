<?php

namespace Database\Seeders;

use App\Models\Shipper;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class ShipperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $createMultipleShipper = [
            [
                'code_shipper' => 'PRN',
                'name' => 'CV. PESONA RATTAN NUSANTARA',
                'address' => 'JL. KARANG MALANG NO. 09, DESA BODESARI - PLUMBON CIREBON WEST JAVA - INDONESIA',
                'phone_1' => '0231323322',
                'phone_2' => '',
                'fax' => '02231325103',
                'email' => '',
                'mandatory_tax_id' => 1,
                'tax_id' => '',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'code_shipper' => 'CMA',
                'name' => 'PT. COCOTAMA MAKMUR ABADI',
                'address' => 'JL. ZAINUDDIN NO. 12 PONTIANAK 78111, KALIMANTAN BARAT',
                'phone_1' => '0561742079',
                'phone_2' => '',
                'fax' => '',
                'email' => '',
                'mandatory_tax_id' => 1,
                'tax_id' => '',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'code_shipper' => 'TCI',
                'name' => 'PT. TRINITY CHARCOAL INDONESIA',
                'address' => 'JL. ARYA SALINGSINGAN RT O12 I RW OO4 DESA KASUGENGAN KIDUL KEC. DEPOK KAB. CIREBON, JAWA BARAT - INDONESIA 45155',
                'phone_1' => '',
                'phone_2' => '',
                'fax' => '',
                'email' => '',
                'mandatory_tax_data_id' => 1,
                'tax_id' => '',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ];
        Shipper::insert($createMultipleShipper); // Eloquent

    }
}
