<?php

namespace Database\Seeders;

use App\Models\TypeCurrency;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeCurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $createMultipleTypeCurrency = [
            [
                'code_currency' => 'AMD',
                'name' => 'ARMENIAN DRAM',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'code_currency' => 'ANG',
                'name' => 'NETHERLANDS ANTILLEAN GUILDER',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'code_currency' => 'AUD',
                'name' => 'AUSTALIAN DOLLAR',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'code_currency' => 'BND',
                'name' => 'BRUNEI DOLLAR',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'code_currency' => 'CHF',
                'name' => 'SWISS FRANC',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'code_currency' => 'DKK',
                'name' => 'DANISH KRONE',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'code_currency' => 'EUR',
                'name' => 'EURO',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'code_currency' => 'GBP',
                'name' => 'STERLING',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'code_currency' => 'HKD',
                'name' => 'HONGKONG DOLLAR',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'code_currency' => 'IDR',
                'name' => 'INDONESIAN RUPIAH',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'code_currency' => 'ILS',
                'name' => 'ISRAELI NEW SHEKEL',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'code_currency' => 'INR',
                'name' => 'INDIAN RUPEE',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'code_currency' => 'JOD',
                'name' => 'JORDANIAN DINAR',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'code_currency' => 'MAD',
                'name' => 'MOROCCAN DIRHAM',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'code_currency' => 'MRU',
                'name' => 'MAURITANIAN OUGUIYA',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'code_currency' => 'NZD',
                'name' => 'NEW ZEALAND DOLLAR',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'code_currency' => 'RUB',
                'name' => 'RUSSIAN ROUBLE',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'code_currency' => 'SGD',
                'name' => 'SINGAPORE DOLLAR',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'code_currency' => 'SHP',
                'name' => 'SAINT HELENA POUND',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'code_currency' => 'TRY',
                'name' => 'TURKISH LIRA',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'code_currency' => 'USD',
                'name' => 'UNITED STATES DOLLAR',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'code_currency' => 'XAF',
                'name' => 'CENTRAL AFRICAN CFA FRANC',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'code_currency' => 'XCD',
                'name' => 'EASTERN CARIBEBAN DOLLAR',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'code_currency' => 'XOF',
                'name' => 'WEST AFRICAN CFA FRANC',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'code_currency' => 'XPF',
                'name' => 'CFP FRANC',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'code_currency' => 'ZAR',
                'name' => 'SOUNT AFRICAN RAND',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

        ];
        TypeCurrency::insert($createMultipleTypeCurrency); // Eloquent
    }
}
