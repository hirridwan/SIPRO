<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitKerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('unit_kerja')->insert([
            ['nama'=>'SDM dan Umum'],
            ['nama'=>'Divisi Pemasaran'],
            ['nama'=>'Divisi Remedial'],
            ['nama'=>'Divisi Kepatuhan dan Manrisk'],
            ['nama'=>'Audit Internal'],
            ['nama'=>'Kantor Pusat Operasional'],
            ['nama'=>'Kantor Cabang Rancah'],
            ['nama'=>'Kantor Cabang Bantarkalong'],
            ['nama'=>'Kantor Cabang Bojonggambir'],
        ]);
    }
}
