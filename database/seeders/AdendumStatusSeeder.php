<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\hash;
use Illuminate\Support\Str;

class AdendumStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('adendum_statuses')->insert([
            ['step'=>1,'code'=>'01','name'=>'register'],
            ['step'=>2,'code'=>'02','name'=>'survey'],
            ['step'=>3,'code'=>'03','name'=>'komite kabag cabang'],
            ['step'=>4,'code'=>'04','name'=>'komite pinca'],
            ['step'=>5,'code'=>'05','name'=>'komite kabag pusat'],
            ['step'=>6,'code'=>'06','name'=>'komite kadiv'],
            ['step'=>7,'code'=>'07','name'=>'opini kepatuhan'],
            ['step'=>8,'code'=>'08','name'=>'review direktur'],
            ['step'=>9,'code'=>'09','name'=>'acc dirut'],
            ['step'=>10,'code'=>'10','name'=>'selesai'],
        ]);
    }
}
