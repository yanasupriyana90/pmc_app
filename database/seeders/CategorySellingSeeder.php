<?php

namespace Database\Seeders;

use App\Models\CategorySelling;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySellingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $createMultipleCategorySelling = [
            [
                'name' => 'OCEAN FREIGHT',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
                ],

                [
                'name' => 'THC',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
                ],

                [
                'name' => 'OWS',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
                ],

                [
                'name' => 'INLAND',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
                ],

                [
                'name' => 'WAR RISK',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
                ],

                [
                'name' => 'BK',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
                ],

                [
                'name' => 'ENS',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
                ],

                [
                'name' => 'TUSLAH',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
                ],

                [
                'name' => 'BUC/BAF',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
                ],

                [
                'name' => 'TUSLAH',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
                ],

                [
                'name' => 'PROLINER CHARGES',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
                ],

                [
                'name' => 'INTERMODAL',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
                ],

                [
                'name' => 'DOCS FEE',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
                ],

                [
                'name' => 'ADMIN FEE',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
                ],

                [
                'name' => 'SEAL FEE',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
                ],

                [
                'name' => 'TELEX/SWB FEE',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
                ],

                [
                'name' => 'TRUCKING',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
                ],

                [
                'name' => 'LOLO',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
                ],

                [
                'name' => 'PENUMPUKAN (KARTU)',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
                ],

                [
                'name' => 'HANDLING',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
                ],

                [
                'name' => 'TRANSFER EDI PEB',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
                ],

                [
                'name' => 'PICK UP B/L',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
                ],

                [
                'name' => 'BIAYA TEMBAK OPEN',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
                ],

                [
                'name' => 'SHT COA OF CARSURIN / BECKJORINDO',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
                ],

                [
                'name' => 'VANNING OF CARSURIN / BECKJORINDO',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
                ],

                [
                'name' => 'TRANSPORT',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
                ],

                [
                'name' => 'EQUIPMENT (ESS)',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
                ],

                [
                'name' => 'RC',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
                ],

                [
                'name' => 'SEWA USER',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
                ],

                [
                'name' => 'UNDERNAME',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
                ],

                [
                'name' => 'PPH TAGIHAN 1% DARI TOTAL',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
                ],

                [
                'name' => 'PPN 11%',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
                ],

                [
                'name' => 'PPH UNDERNAME 0,5%',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
                ],

                [
                'name' => 'LATE PAYMENT',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
                ],

        ];
        CategorySelling::insert($createMultipleCategorySelling); // Eloquent
    }
}
