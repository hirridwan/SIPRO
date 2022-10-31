<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\hash;
use Illuminate\Support\Str;

class MaritalStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('marital_statuses')->insert([
            ['code'=>'1','name'=>'TIDAK MENIKAH'],
            ['code'=>'2','name'=>'MENIKAH'],
            ['code'=>'3','name'=>'CERAI HIDUP'],
            ['code'=>'4','name'=>'CERAI MATI'],
        ]);
    }
}
