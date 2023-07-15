<?php

namespace Database\Seeders;

use App\Models\CostOfSale;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CostOfSaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $createMultipleCos = [
            [
                'selling_buying_id' => 1,
                'item_name' => 'OCEAN FREIGHT',
                'volume' => 4,
                'price' => 2400.0000,
                'actual_amt' =>  9600.0000,
                'tax_rate' => 0,
                'tax_amt' => 0,
                'final_amount' => 9600.0000,
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'selling_buying_id' => 1,
                'item_name' => 'THC',
                'volume' => 4,
                'price' => 159.5000,
                'actual_amt' =>  638.0000,
                'tax_rate' => 0,
                'tax_amt' => 0,
                'final_amount' => 638.0000,
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

        ];
        CostOfSale::insert($createMultipleCos); // Eloquent
    }
}
