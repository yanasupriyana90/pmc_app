<?php

namespace Database\Seeders;

use App\Models\JobSheet;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobSheetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $createMultipleJobSheet = [
            [
                'code_js' => 'JS-071123-0007',
                'booking_no' => '',
                'shipper_id' => 1,
                'undername_mbl_id' => 1,
                'undername_hbl_id' => null,
                'name_cons' => 'ASEP',
                'address_cons' => 'UMMQSSAR',
                'phone_1_cons' => '085724348292',
                'phone_2_cons' => '',
                'fax_cons' => '',
                'email_cons' => 'asep@gmail.com',
                'mandatory_tax_id_cons' => 2,
                'tax_id_cons' => '21710971207',
                'same_as_consignee' => 'SAME AS CONSIGNEE',
                'name_notify' => '',
                'address_notify' => '',
                'phone_1_notify' => '',
                'phone_2_notify' => '',
                'fax_notify' => '',
                'email_notify' => '',
                'mandatory_tax_id_notify' => null,
                'tax_id_notify' => '',
                'carrier' => 'COSCO + PMP + TCT',
                'vessel' => 'CTP GOLDEN 23W22',
                'etd' => Carbon::parse('2023-07-14')->format('Y-m-d'),
                'pol' => 'CGK, INTERNATIONAL SUTA AIRPORT',
                'pod' => 'UMMQSSAR',
                'open_cy' => null,
                'closing_doc' => null,
                'closing_cy' => null,
                'volume' => 4,
                'cont_size_type_id' => 5,
                'qty' => 4570,
                'type_packaging_id' => 50,
                'commodity_mbl' => 'TISSUE ROLL',
                'hs_code_mbl' => '58011189',
                'mbl_type_bl_id' => 1,
                'commodity_hbl' => '',
                'hs_code_hbl' => '',
                'hbl_type_bl_id' => 1,
                'stuffing_date' => Carbon::parse('2023-07-13')->format('Y-m-d'),
                'stuffing_address' => 'TAMAN KOPO INDAH 3 BLOK E16 NO.72',
                'pic_name' => 'WAWAN',
                'pic_phone' => '+6281313425301',
                'top' => 'CASH',
                'type_payment_id' => 1,
                'remarks' => 'TERM OF PAYMENT FOR OCEAN FREGHT IS CASH & CARRY',
                'si_doc' => 'si_64ad1c6aa2d67.pdf',
                'status' => 1,
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

        ];
        JobSheet::insert($createMultipleJobSheet); // Eloquent
    }
}
