<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Exceptions\Handler;
use App\Models\BankAccount;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            // Master
            DivisionSeeder::class,
            UserSeeder::class,
            CategoryBuySellSeeder::class,
            ContainerSizeTypeSeeder::class,
            MandatoryTaxSeeder::class,
            TypeBillOfLadingSeeder::class,
            TypeCurrencySeeder::class,
            TypeMeasurementSeeder::class,
            TypePackagingSeeder::class,
            TypePaymentSeeder::class,
            TypeWeightSeeder::class,
            ShipperSeeder::class,
            UndernameHblSeeder::class,
            UndernameMblSeeder::class,
            BankAccountSeeder::class,
            ChartOfAccountHead1Seeder::class,
            // DailySalesReportSeeder::class,

            // Marketing
            JobSheetSeeder::class,
            ContSealDetailSeeder::class,
            SellingBuyingSeeder::class,
            RevenueOfSaleSeeder::class,
            EmklSeeder::class,
            CostOfSaleSeeder::class,
            HandlingSeeder::class,
        ]);
    }
}
