<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\hash;
use Illuminate\Support\Str;

class DepartementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departements')->insert([
            ['name'=>'Divisi SDM dan Umum','office_id'=>1],
            ['name'=>'Divisi Pemasaran','office_id'=>1],
            ['name'=>'Divisi Remedial','office_id'=>1],
            ['name'=>'Divisi Kepatuan dan Manrisk','office_id'=>1]
        ]);
    }
}
