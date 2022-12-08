<?php

namespace Database\Seeders;

use App\Models\ContainerSizeType;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContainerSizeTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $createMultipleContainerSizeType = [
            ['name'=>"20' BULK CONTAINER",
            'user_id' => 2,
            'created_at'=> Carbon::now(),
            'updated_at' => Carbon::now()],

            ['name'=>"20' DC DRY CONTAINER",
            'user_id' => 2,
            'created_at'=>Carbon::now(),
            'updated_at' => Carbon::now()],

            ['name'=>"20' FC FLATRACK CONTAINER",
            'user_id' => 2,
            'created_at'=>Carbon::now(),
            'updated_at' => Carbon::now()],

            ['name'=>"20' FO OPEN TOP CONTAINER",
            'user_id' => 2,
            'created_at'=>Carbon::now(),
            'updated_at' => Carbon::now()],

            ['name'=>"20' HANGER CONTAINER",
            'user_id' => 2,
            'created_at'=>Carbon::now(),
            'updated_at' => Carbon::now()],

            ['name'=>"20' OPEN SIDE CONTAINER",
            'user_id' => 2,
            'created_at'=>Carbon::now(),
            'updated_at' => Carbon::now()],

            ['name'=>"20' TANK CONTAINER",
            'user_id' => 2,
            'created_at'=>Carbon::now(),
            'updated_at' => Carbon::now()],

            ['name'=>"20' VENTILATION CONTAINER",
            'user_id' => 2,
            'created_at'=>Carbon::now(),
            'updated_at' => Carbon::now()],

            ['name'=>"40' BULK CONTAINER",
            'user_id' => 2,
            'created_at'=>Carbon::now(),
            'updated_at' => Carbon::now()],

            ['name'=>"40' DC DRY CONTAINER ",
            'user_id' => 2,
            'created_at'=>Carbon::now(),
            'updated_at' => Carbon::now()],

            ['name'=>"40' FC FLATRACK CONTAINER",
            'user_id' => 2,
            'created_at'=>Carbon::now(),
            'updated_at' => Carbon::now()],

            ['name'=>"40' FO OPEN TOP CONTAINER",
            'user_id' => 2,
            'created_at'=>Carbon::now(),
            'updated_at' => Carbon::now()],

            ['name'=>"40' HANGER CONTAINER",
            'user_id' => 2,
            'created_at'=>Carbon::now(),
            'updated_at' => Carbon::now()],

            ['name'=>"40' HC HIGHCUBE CONTAINER",
            'user_id' => 2,
            'created_at'=>Carbon::now(),
            'updated_at' => Carbon::now()],

            ['name'=>"40' OPEN SIDE CONTAINER",
            'user_id' => 2,
            'created_at'=>Carbon::now(),
            'updated_at' => Carbon::now()],

            ['name'=>"40' RQ HIGHCUBE REEFER CONTAINER",
            'user_id' => 2,
            'created_at'=>Carbon::now(),
            'updated_at' => Carbon::now()],

            ['name'=>"40' TANK CONTAINER",
            'user_id' => 2,
            'created_at'=>Carbon::now(),
            'updated_at' => Carbon::now()],

            ['name'=>"40' VENTILATION CONTAINER",
            'user_id' => 2,
            'created_at'=>Carbon::now(),
            'updated_at' => Carbon::now()],


        ];
        ContainerSizeType::insert($createMultipleContainerSizeType); // Eloquent
    }
}
