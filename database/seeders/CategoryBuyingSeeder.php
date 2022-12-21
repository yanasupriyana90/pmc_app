<?php

namespace Database\Seeders;

use App\Models\CategoryBuying;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryBuyingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $createMultipleCategoryBuying = [
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
                'name' => 'OWS 18-23 TON',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
                ],

                [
                'name' => 'ARBITRARY / INLAND',
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
                'name' => 'GFS',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
                ],

                [
                'name' => 'THERMAL BLANKET / PROLINER',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
                ],

                [
                'name' => 'DG FEE',
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
                'name' => 'EMKL',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
                ],

                [
                'name' => 'DOC FEE',
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
                'name' => 'SEAL FEE UNDERNAME',
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

                [
                'name' => 'TELEX/SSWB FEE',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
                ],

                [
                'name' => 'COO DEPERINDAG',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
                ],

                [
                'name' => 'SHT + COA OF CARSURIN / BECKJORINDO',
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
                'name' => 'BIAYA PENITIPAN REPO',
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
                'name' => 'OVERWEIGHT',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
                ],

                [
                'name' => 'OVERSTAY',
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
                'name' => 'BK',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
                ],

                [
                'name' => 'FAD (ADDITIONAL)',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
                ],

        ];
        CategoryBuying::insert($createMultipleCategoryBuying); // Eloquent
    }
}
