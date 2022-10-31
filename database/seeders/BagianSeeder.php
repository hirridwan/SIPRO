<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\hash;
use Illuminate\Support\Str;

class BagianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bagian')->insert([
            ['nama'=>'SDM'],
            ['nama'=>'Umum'],
            ['nama'=>'SDM dan Umum'],
            ['nama'=>'IT'],
            ['nama'=>'Pelaporan'],
            ['nama'=>'IT Pelaporan'],
            ['nama'=>'Pemasaran'],
            ['nama'=>'Dana'],
            ['nama'=>'Kredit'],
            ['nama'=>'Remedial'],
            ['nama'=>'Audit Internal'],
            ['nama'=>'Kepatuhan dan Manrisk'],
            ['nama'=>'Utama'],
        ]);
    }
}
