<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\hash;
use Illuminate\Support\Str;

class UsageTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usage_types')->insert([
            ['code'=>'10','name'=>'MODAL KERJA'],
            ['code'=>'20','name'=>'INVESTASI'],
            ['code'=>'31','name'=>'KPR YANG AGUNANNYA DIIKAT DENGAN HAK TANGGUNGAN'],
            ['code'=>'32','name'=>'KPR YANG TIDAK DIIKAT DENGAN HAK TANGGUNGAN'],
            ['code'=>'35','name'=>'KREDIT KEPEMILIKAN KENDARAAN BERMOTOR'],
            ['code'=>'39','name'=>'KREDIT KONSUMSI LAINNYA'],
        ]);
    }
}
