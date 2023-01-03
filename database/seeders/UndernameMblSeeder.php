<?php

namespace Database\Seeders;

use App\Models\UndernameMbl;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UndernameMblSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $createMultipleUndernameMbl = [
            [
                'code_undername_mbl' => 'MPS',
                'name' => 'PT. MULTI PANGAN SEJAHTERA',
                'address' => 'JL. CIBOLERANG KOMPLEK SPBU CIBOLERANG NO.5 MARGAHAYU UTARA BABAKAN CIPARAY',
                'phone_1' => '02254412874',
                'phone_2' => '',
                'fax' => '',
                'email' => 'exim@mpsejahtera.my.id',
                'mandatory_tax_id' => 2,
                'tax_id' => '86.113.579.6-424.000',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'code_undername_mbl' => 'CMJ',
                'name' => 'CV. MEKAR JAYA',
                'address' => 'BUMI SUKAGALIH PERMAI C. 144 RT 002 RW 009 SANGKANHURIP-KATAPANG KAB. BANDUNG 40921 ',
                'phone_1' => '02284229529',
                'phone_2' => '',
                'fax' => '',
                'email' => 'mekarjaya_66@gmail.com',
                'mandatory_tax_id' => 2,
                'tax_id' => '31.527.991.9-445.000',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],


            [
                'code_undername_mbl' => 'LMN',
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
                'code_undername_mbl' => 'PPI',
                'name' => 'PT. PUNDI MAS PERUSAHAAN INDONESIA',
                'address' => 'TAMAN KOPO INDAH III BLOK E16 NO.72 RT 007 RW 002 MEKAR RAHAYU, MARGAASIH 40218',
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


            [
                'code_undername_mbl' => 'CPM',
                'name' => 'CV. PUNDI MAS',
                'address' => 'TAMAN KOPO INDAH III C NO.37 RT. 004 RW. 013 RAHAYU, MARGAASIH KAB. BANDUNG, JAWA BARAT INDONESIA',
                'phone_1' => '(022) 54428218 ',
                'phone_2' => '',
                'fax' => '',
                'email' => 'document@pundimascorps.com',
                'mandatory_tax_id' => 2,
                'tax_id' => '76.066.492.0-445.000',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ];
        UndernameMbl::insert($createMultipleUndernameMbl); // Eloquent
    }
}
