<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\hash;
use Illuminate\Support\Str;

class LoanProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('loan_products')->insert([
            ['code'=>'103','name'=>'KREDIT PROGRAM KPPER'],
            ['code'=>'104','name'=>'KREDIT PEGAWAI'],
            ['code'=>'105','name'=>'KREDIT KMG'],
            ['code'=>'106','name'=>'KREDIT JAMINAN BTB'],
            ['code'=>'107','name'=>'KREDIT KREATIF'],
            ['code'=>'108','name'=>'KREDIT LEMBAGA'],
            ['code'=>'109','name'=>'KREDIT LPDB'],
            ['code'=>'110','name'=>'KREDIT PEGAWAI INTERNAL'],
            ['code'=>'111','name'=>'KREDIT KAGUM'],
            ['code'=>'112','name'=>'KREDIT KEREN'],
            ['code'=>'113','name'=>'KREDIT KAIDAH'],
            ['code'=>'114','name'=>'KREDIT KRING'],
            ['code'=>'115','name'=>'KREDIT P2P LENDING'],
            ['code'=>'116','name'=>'KREDIT MULTIGUNA-CIJ'],
        ]);
    }
}
