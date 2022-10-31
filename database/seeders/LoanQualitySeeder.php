<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\hash;
use Illuminate\Support\Str;

class LoanQualitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('loan_qualities')->insert([
            ['code'=>'L','name'=>'LANCAR'],
            ['code'=>'DPK','name'=>'DALAM PENGAWASAN KHUSUS'],
            ['code'=>'KL','name'=>'KURANG LANCAR'],
            ['code'=>'D','name'=>'DIRAGUKAN'],
            ['code'=>'M','name'=>'MACET'],
        ]);
    }
}
