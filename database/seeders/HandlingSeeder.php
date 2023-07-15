<?php

namespace Database\Seeders;

use App\Exceptions\Handler;
use App\Models\Handling;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HandlingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $createMultipleHand = [
            [
                'selling_buying_id' => 1,
                'item_name' => 'DOCS FEE',
                'volume' => 1,
                'price' => 110000.0000,
                'actual_amt' =>  110000.0000,
                'tax_rate' => 0,
                'tax_amt' => 0,
                'final_amount' => 110000.0000,
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'selling_buying_id' => 1,
                'item_name' => 'ADMIN FEE',
                'volume' => 1,
                'price' => 165000.0000,
                'actual_amt' =>  165000.0000,
                'tax_rate' => 0,
                'tax_amt' => 0,
                'final_amount' => 165000.0000,
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'selling_buying_id' => 1,
                'item_name' => 'SEAL FEE',
                'volume' => 4,
                'price' => 143000.0000,
                'actual_amt' =>  572000.0000,
                'tax_rate' => 0,
                'tax_amt' => 0,
                'final_amount' => 572000.0000,
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'selling_buying_id' => 1,
                'item_name' => 'TRUCKING PMP',
                'volume' => 3,
                'price' => 3900000.0000,
                'actual_amt' =>  11700000.0000,
                'tax_rate' => 0,
                'tax_amt' => 0,
                'final_amount' => 11700000.0000,
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'selling_buying_id' => 1,
                'item_name' => 'TRUCKING CJS',
                'volume' => 1,
                'price' => 3900000.0000,
                'actual_amt' =>  3900000.0000,
                'tax_rate' => 0,
                'tax_amt' => 0,
                'final_amount' => 3900000.0000,
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'selling_buying_id' => 1,
                'item_name' => 'LOLO',
                'volume' => 4,
                'price' => 616050.0000,
                'actual_amt' =>  2464200.0000,
                'tax_rate' => 0,
                'tax_amt' => 0,
                'final_amount' => 2464200.0000,
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'selling_buying_id' => 1,
                'item_name' => 'PENUMPUKAN (KARTU)',
                'volume' => 4,
                'price' => 586912.5000,
                'actual_amt' =>  2347650.0000,
                'tax_rate' => 0,
                'tax_amt' => 0,
                'final_amount' => 2347650.0000,
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'selling_buying_id' => 1,
                'item_name' => 'HANDLING',
                'volume' => 4,
                'price' => 75750.0000,
                'actual_amt' =>  303000.0000,
                'tax_rate' => 0,
                'tax_amt' => 0,
                'final_amount' => 303000.0000,
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'selling_buying_id' => 1,
                'item_name' => 'TRANSFER EDI PEB',
                'volume' => 1,
                'price' => 75000.0000,
                'actual_amt' =>  75000.0000,
                'tax_rate' => 0,
                'tax_amt' => 0,
                'final_amount' => 75000.0000,
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'selling_buying_id' => 1,
                'item_name' => 'R/C 1',
                'volume' => 4,
                'price' => 1500000.0000,
                'actual_amt' =>  6000000.0000,
                'tax_rate' => 0,
                'tax_amt' => 0,
                'final_amount' => 6000000.0000,
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'selling_buying_id' => 1,
                'item_name' => 'BIAYA PENITIPAN + REPO',
                'volume' => 1,
                'price' => 650000.0000,
                'actual_amt' =>  650000.0000,
                'tax_rate' => 0,
                'tax_amt' => 0,
                'final_amount' => 650000.0000,
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

        ];
        Handling::insert($createMultipleHand); // Eloquent
    }
}
