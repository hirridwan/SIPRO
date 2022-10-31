<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\hash;
use Illuminate\Support\Str;

class InterestSystemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('interest_systems')->insert([
            ['code'=>'10','name'=>'FLATE'],
            ['code'=>'14','name'=>'FLATE GP DISTRIBUSI'],
            ['code'=>'20','name'=>'EFEKTIF HARIAN (RC)'],
            ['code'=>'21','name'=>'EFEKTIF HARIAN (NON RC)'],
            ['code'=>'22','name'=>'EFEKTIF BULANAN'],
            ['code'=>'24','name'=>'EFEKTIF NON ANGSURAN'],
            ['code'=>'30','name'=>'ANUITAS'],
            ['code'=>'40','name'=>'KONVERSI'],
            ['code'=>'41','name'=>'KONVERSI 41'],
        ]);
    }
}
