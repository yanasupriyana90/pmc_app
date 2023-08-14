<?php

namespace Database\Seeders;

use App\Models\ContSealDetail;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContSealDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $createMultipleContSealDetail = [
            [
                'job_sheet_head_id' => 1,
                'cont_name' => 'SEGU5409726',
                'seal_name' => 'YMAJ98597',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'job_sheet_head_id' => 1,
                'cont_name' => 'SEGU4590286',
                'seal_name' => 'YMAJ198596',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'job_sheet_head_id' => 1,
                'cont_name' => 'CXDU2331040',
                'seal_name' => 'YMAJ98593',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'job_sheet_head_id' => 1,
                'cont_name' => 'SEGU5815448',
                'seal_name' => 'YMAJ198595',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

        ];
        ContSealDetail::insert($createMultipleContSealDetail); // Eloquent
    }
}
