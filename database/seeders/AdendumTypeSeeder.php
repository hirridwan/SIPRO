<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\hash;
use Illuminate\Support\Str;


class AdendumTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('adendum_types')->insert([
            ['code'=>'1','name'=>'Reschedulling'],
            ['code'=>'2','name'=>'Restrukturing'],
            ['code'=>'3','name'=>'Reconditioning'],
        ]);
    }
}
