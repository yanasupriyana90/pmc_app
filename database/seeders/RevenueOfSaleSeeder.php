<?php

namespace Database\Seeders;

use App\Models\RevenueOfSale;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RevenueOfSaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $createMultipleRos = [
            [
                'selling_buying_id' => 1,
                'item_name' => 'OCEAN FREIGHT',
                'volume' => 4,
                'price' => 6550.0000,
                'actual_amt' =>  26200.0000,
                'tax_rate' => 0,
                'tax_amt' => 0,
                'final_amount' => 26200.0000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

        ];
        RevenueOfSale::insert($createMultipleRos); // Eloquent
    }
}
