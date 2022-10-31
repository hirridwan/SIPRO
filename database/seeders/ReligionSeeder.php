<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\hash;
use Illuminate\Support\Str;

class ReligionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('religions')->insert([
            ['code'=>'1','name'=>'ISLAM'],
            ['code'=>'2','name'=>'KRISTEN'],
            ['code'=>'3','name'=>'KATOLIK'],
            ['code'=>'4','name'=>'HINDU'],
            ['code'=>'5','name'=>'BUDHA'],
            ['code'=>'6','name'=>'KONGHUCU'],
            ['code'=>'7','name'=>'LAIN-LAIN / KEPERCAYAAN'],
        ]);
    }
}
