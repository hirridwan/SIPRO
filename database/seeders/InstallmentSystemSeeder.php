<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\hash;
use Illuminate\Support\Str;


class InstallmentSystemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('installment_systems')->insert([
            ['code'=>'1','name'=>'HARIAN'],
            ['code'=>'2','name'=>'MINGGUAN'],
            ['code'=>'3','name'=>'BULANAN'],
            ['code'=>'4','name'=>'TRIWULANAN'],
            ['code'=>'5','name'=>'SEMESTERAN'],
            ['code'=>'6','name'=>'TAHUNAN'],
            ['code'=>'7','name'=>'MUSIMAN'],
            ['code'=>'8','name'=>'NON ANGSURAN'],
        ]);
    }
}
