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
            [
                'name' => "20AC - 20' AIR CONTAINER",
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => "20FL - 20FT FLAT RACK CONTAINER",
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => "20FS - 20' FLAT RACK ESPCIALLY FOR COIL",
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => "20GP - 20' GENERAL PURPOSE CONTAINER",
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => "20H1 - 20' HANGER CONTAINER RACK 1-TIER - 8'6'",
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => "20H2 - 20' HANGER CONTAINER RACK 2-TIER - 8'6'",
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => "20H3 - 20' HANGER CONTAINER RACK 3-TIER - 8'6'",
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => "20H4 - 20' HANGER CONTAINER RACK 4-TIER - 8'6'",
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => "20HG - 20FT HANGER CONTAINER",
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],


            [
                'name' => "20HH - 20' HALF HEIGHT OPEN TOP - 4'3'",
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => "20HQ - 20' HI-CUBE CONTAINER",
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => "20IH - 20' INSULATED & HEATED - 8'6'",
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],


            [
                'name' => "20MU - 20'GP WITH NETIC MOTHER UNIT",
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => "20OC - 20' HIGH CUBE OPEN TOP ESPCIALLY FOR COAL",
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => "20OM - 20' HIGH CUBE OPEN TOP MULTI PURPOSE",
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => "20OS - 20' OPEN SIDE - 8'6'",
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => "20OT - 20FT OPEN TOP CONTAINER",
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => "20PL - 20' PLATFORM",
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => "20RF - 20' REFRIGERATED CONTAINER ",
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => "20RQ - 20' REEFER - 9'6'",
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => "20TK - 20FT Tank Container",
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => "20VT - 20' VENTILATED - 8'6'",
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => "20XX - 20' MISCELLANEOUS",
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => "40AC - 40' AIR CONTAINERS",
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => "40FL - 40FT FLAT RACK CONTAINER",
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => "40G1 - 40' HQ HANGER CONTAINER RACK 1-TIER - 9'6'",
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => "40G2 - 40' HQ HANGER CONTAINER RACK 2-TIER - 9'6'",
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => "40G3 - 40' HQ HANGER CONTAINER RACK 3-TIER - 9'6'",
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => "40G4 - 40' HQ HANGER CONTAINER RACK 4-TIER - 9'6'",
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => "40GH - 40' GENERAL PURPOSE WITH HANGER - 9'6'",
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => "40GP - 40' GENERAL PURPOSE CONTAINER",
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => "40GX - 40' GENERAL PURPOSE - 8'6'",
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => "40H1 - 40' HANGER CONTAINER RACK 1-TIER - 9'6'",
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => "40H2 - 40' HANGER CONTAINER RACK 2-TIER - 9'6'",
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => "40H3 - 40' HANGER CONTAINER RACK 3-TIER - 9'6'",
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => "40H4 - 40' HANGER CONTAINER RACK 4-TIER - 9'6'",
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => "40HG - 40' GENERAL PURPOSE WITH HANGER - 8'6'",
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => "40HH - 40' HALF HEIGHT OPEN TOP - 4'3'",
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => "40HQ - 40' HI-CUBE CONTAINER",
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => "40HX - 40' FOOTER WITHOUT TUNNEL - 9'6'",
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => "40IH - 40' INSULATED & HEATED - 8'6'",
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => "40MU - 40'GP WITH NITEC MOTHER UNIT",
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => "40OH - 40' HARD-TOP OPEN TOP",
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => "40OQ - 40' OPEN TOP HIGH CUBE",
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => "40OT - 40FT OPEN TOP CONTAINER",
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => "40PL - 40' PLATFORM",
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => "40RF - 40' REFRIGERATED CONTAINER",
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => "40RQ - 40' HI-CUBE REFRIGERATED CONTAINER",
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => "40SR - 40' SUPER FLAT RACK",
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => "40TK - 40' TANK CONTAINER",
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => "40TK - 40' VENTILATED",
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => "40XX - 40' MISCELLNEOUS",
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => "45GP - 45' GENERAL PURPOSE CONTAINER",
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => "45HQ - 45' HI-CUBE CONTAINER ",
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => "45OT - 45' OPEN TOP",
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => "45RQ - 45' REEFER",
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => "45TK - 45' TANK CONTAINER",
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

        ];
        ContainerSizeType::insert($createMultipleContainerSizeType); // Eloquent
    }
}
