<?php

namespace Database\Seeders;

use App\Models\TypeMeasurement;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeMeasurementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $createMultipleTypeMeasurement = [
            [
                'code_measurement' => 'CBM',
                'name' => 'CUBIC METER',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'code_measurement' => 'CBF',
                'name' => 'CUBIC FOOT',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ];
        TypeMeasurement::insert($createMultipleTypeMeasurement); // Eloquent
    }
}
