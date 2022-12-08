<?php

namespace Database\Seeders;

use App\Models\TypeWeight;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class TypeWeightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $createMultipleTypeWeight = [
            [
                'code_weight' => "KGS",
                'name' => "KILOGRAMS",
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'code_weight' => "LB/LBS",
                'name' => "POUNDS",
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'code_weight' => "M/T (M PER T)",
                'name' => "METRIC TONS",
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ];
        TypeWeight::insert($createMultipleTypeWeight); // Eloquent
    }
}
