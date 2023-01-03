<?php

namespace Database\Seeders;

use App\Models\UndernameHbl;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UndernameHblSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $createMultipleUndernameHbl = [
            [
                'code_undername_hbl' => 'LMN',
                'name' => 'PT. LANCAR MAKMUR NUSANTARA',
                'address' => 'GRIYA JAGABAYA BLOK B.5 NO.1 RT.004 RW.013 JAGABAYA, CIMAUNG KAB. BANDUNG JAWA BARAT',
                'phone_1' => '081320114867',
                'phone_2' => '',
                'fax' => '',
                'email' => 'lmn@lancarmakmurnusantara.com',
                'mandatory_tax_id' => 2,
                'tax_id' => '60.137.152.9-445.000',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'code_undername_hbl' => 'PPI',
                'name' => 'PT. PUNDI MAS PERUSAHAAN INDONESIA',
                'address' => 'TAMAN KOPO INDAH III BLOK E16 NO.72 RT 007 RW 002 MEKAR RAHAYU, MARGAASIH 40218 ',
                'phone_1' => '(022) 54430315',
                'phone_2' => '(022) 54428218',
                'fax' => '',
                'email' => 'csinfo@pundimascorps.com',
                'mandatory_tax_id' => 2,
                'tax_id' => '93.698.190.1-445.000',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ];
        UndernameHbl::insert($createMultipleUndernameHbl); // Eloquent
    }
}
