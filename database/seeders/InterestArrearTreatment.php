<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\hash;
use Illuminate\Support\Str;

class InterestArrearTreatment extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('interest_arrear_treatments')->insert([
            ['code'=>'01','name'=>'KAPITALISASI'],
            ['code'=>'02','name'=>'DIHAPUSKAN'],
            ['code'=>'03','name'=>'DITANGGUHKAN'],
        ]);
    }
}
