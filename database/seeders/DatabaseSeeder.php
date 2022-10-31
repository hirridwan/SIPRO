<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(OfficeSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(DepartementSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(RoleMenuSeeder::class);
        $this->call(InstallmentSystemSeeder::class);
        $this->call(InterestSystemSeeder::class);
        $this->call(LoanQualitySeeder::class);
        $this->call(LoanProductSeeder::class);
        $this->call(UsageTypeSeeder::class);
        $this->call(GendersSeeder::class);
        $this->call(JobTypesSeeder::class);
        $this->call(KotaKabSeeder::class);
        $this->call(MaritalStatusesSeeder::class);
        $this->call(ReligionSeeder::class);
        $this->call(AdendumTypeSeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(LoanSeeder::class);
        $this->call(InterestArrearTreatment::class);
        $this->call(LastRequestNumber::class);
        $this->call(AdendumStatusSeeder::class);
        $this->call(InsuranceStatusesSeeder::class);
        $this->call(CollateralTypeSeeder::class);
        $this->call(FinancialAnalysisCodeSeeder::class);
        $this->call(JabatanSeeder::class);
        $this->call(BagianSeeder::class);
        $this->call(UnitKerjaSeeder::class);
    }
}
