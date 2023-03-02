<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $createMultipleUser = [
            ['name' => 'SUPERUSER',
            'email'=>'superuser@pundimascorps.com',
            'username' => 'SUPERUSER',
            'password' => bcrypt('superuser'),
            'division_id' => 1,
            'created_at'=> Carbon::now(),
            'updated_at' => Carbon::now()],

            ['name' => 'USER 1',
            'email'=>'user-1@pundimascorps.com',
            'username' => 'USER-1',
            'password' => bcrypt('user-1'),
            'division_id' => 2,
            'created_at'=> Carbon::now(),
            'updated_at' => Carbon::now()],

            ['name' => 'USER 2',
            'email'=>'user-2@pundimascorps.com',
            'username' => 'USER-2',
            'password' => bcrypt('user-2'),
            'division_id' => 3,
            'created_at'=> Carbon::now(),
            'updated_at' => Carbon::now()],

            ['name' => 'USER 3',
            'email'=>'user-3@pundimascorps.com',
            'username' => 'USER-3',
            'password' => bcrypt('user-3'),
            'division_id' => 4,
            'created_at'=> Carbon::now(),
            'updated_at' => Carbon::now()],

            ['name' => 'USER 4',
            'email'=>'user-4@pundimascorps.com',
            'username' => 'USER-4',
            'password' => bcrypt('user-4'),
            'division_id' => 5,
            'created_at'=> Carbon::now(),
            'updated_at' => Carbon::now()],

            ['name' => 'USER 5',
            'email'=>'user-5@pundimascorps.com',
            'username' => 'USER-5',
            'password' => bcrypt('user-5'),
            'division_id' => 6,
            'created_at'=> Carbon::now(),
            'updated_at' => Carbon::now()],

            ['name' => 'USER 6',
            'email'=>'user-6@pundimascorps.com',
            'username' => 'USER-6',
            'password' => bcrypt('user-6'),
            'division_id' => 7,
            'created_at'=> Carbon::now(),
            'updated_at' => Carbon::now()],
        ];
        User::insert($createMultipleUser); // Eloquent
    }
}
