<?php

namespace Database\Seeders;

use App\Models\Emkl;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmklSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $createMultipleEmkl = [
            [
                'selling_buying_id' => 1,
                'item_name' => 'ADDITIONAL TRUCKING',
                'volume' => 4,
                'price' => 6550.0000,
                'actual_amt' =>  2600000.0000,
                'tax_rate' => 0,
                'tax_amt' => 0,
                'final_amount' => 2600000.0000,
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
        Emkl::insert($createMultipleEmkl); // Eloquent
    }
}
