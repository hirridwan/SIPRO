<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\hash;
use Illuminate\Support\Str;

class LoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('loans')->insert([
            ['office_code'=>'01',
            'loan_id'=>'01.312.00012',
            'cif'=>'01.1.49275',
            'plafon'=>'150000000',
            'outstanding'=>'49985467',
            'interest'=>'14.40',
            'provision'=>'1.00',
            'period'=>48,
            'start_date'=>'2019-10-21',
            'due_date'=>'2023-10-21',
            'loan_count'=>3,
            'installment_system_code'=>'1',
            'interest_system_code'=>'10',
            'usage_type_code'=>'39',
            'loan_product_code'=>'112',
            'quality_id'=>2,
            'loan_arrear'=>'9360467.00',
            'loan_arrear_day'=>88,
            'interest_arrear'=>'5014533.00',
            'interest_arrear_day'=>57,
            'penalty'=>'1275546']
        ]);
    }
}
