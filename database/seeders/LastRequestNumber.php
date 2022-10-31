<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\hash;
use Illuminate\Support\Str;

class LastRequestNumber extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('last_request_numbers')->insert([
            ['last_number'=>0,'office_code'=>'01'],
            ['last_number'=>0,'office_code'=>'02'],
            ['last_number'=>0,'office_code'=>'03'],
            ['last_number'=>0,'office_code'=>'04'],
        ]);
    }
}
