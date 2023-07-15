<?php

namespace Database\Seeders;

use App\Models\SellingBuying;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SellingBuyingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $createMultipleSellingBuying = [
            [
                'job_sheet_head_id' => 1,
                'exchange_rate_ros' => 16217.5800,
                'exchange_rate_cos' => 16036.5533,
                'total_ros' =>  26200.0000,
                'total_ex_rate_ros' => 424900596.0000,
                'total_emkl' =>  3250000.0000,
                'total_cos' =>  10238.0000,
                'total_ex_rate_cos' =>  164182232.8185,
                'total_handling' =>  28286850.0000,
                'grand_total_selling' =>  428150596.0000,
                'grand_total_buying' => 192469082.8185,
                'profit_loss' => 235681513.1815,
                'remark' => 'TERM OF PAYMENT FOR OCEAN FREGHT IS CASH & CARRY',
                'user_id' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

        ];
        SellingBuying::insert($createMultipleSellingBuying); // Eloquent
    }
}
