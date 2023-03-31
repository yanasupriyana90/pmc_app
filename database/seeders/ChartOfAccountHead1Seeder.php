<?php

namespace Database\Seeders;

use App\Models\ChartOfAccountHead1;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ChartOfAccountHead1Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $createMultipleChartOfAccountHead1 = [
            [
                'code' => '1.0',
                'desc' => 'AKTIVA LANCAR',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'code' => '1.1',
                'desc' => 'AKTIVA TETAP',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'code' => '2.0',
                'desc' => 'KEWAJIBAN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'code' => '3.0',
                'desc' => 'EKUITAS',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'code' => '4.0',
                'desc' => 'PENDAPATAN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'code' => '5.0',
                'desc' => 'BIAYA',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];
        ChartOfAccountHead1::insert($createMultipleChartOfAccountHead1);
    }
}
