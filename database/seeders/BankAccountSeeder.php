<?php

namespace Database\Seeders;

use App\Models\BankAccount;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BankAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $createMultipleBankAccount = [
            [
                'name_bank' => 'BNI PPMC',
                'no_account' => '6777757779',
                'name_account' => 'PT. PUNDI MAS CORPS',
                'saldo' => 100000000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_bank' => 'BNI PMPI',
                'no_account' => '1687717778',
                'name_account' => 'PT. PUNDIMAS PERUSAHAAN INDONESIA',
                'saldo' => 200000000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_bank' => 'BCA CV',
                'no_account' => '3795668777',
                'name_account' => 'CV. PUNDI MAS',
                'saldo' => 300000000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_bank' => 'CASH',
                'no_account' => '000',
                'name_account' => 'CASH IN HAND',
                'saldo' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ];
        BankAccount::insert($createMultipleBankAccount); // Eloquent
    }
}
