<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vendors')->insert([
            [
                'initial_code' => 'DSD',
                'name' => 'HONG KONG DSD TRADING CO., LIMITED',
                'address' => 'SHOP 185 G/F HANG WAI IND CENTRE NO 6 KIN TAI ST TUEN MUN NT HONG KONG',
                'pic_name' => 'XUAN',
                'phone_1' => '+86-13928657107',
                'phone_2' => '+86-13543620387',
                'email' => 'contact@hcmotorku.com',
                'mandatory_tax_id' => 4,
                'tax_id' => '74677518-000-12-22-A',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}
