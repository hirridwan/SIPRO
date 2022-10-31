<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\hash;
use Illuminate\Support\Str;

class OfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('offices')->insert([
            ['code'=>'00','name'=>'KANTOR PUSAT MANAJEMEN','shortname'=>'KPM','address'=>'Cipatujah','order'=>1],
            ['code'=>'01','name'=>'KANTOR PUSAT OPERASIONAL','shortname'=>'KPO','address'=>'Cipatujah','order'=>2],
            ['code'=>'02','name'=>'KANTOR CABANG RANCAH','shortname'=>'RCH','address'=>'Rancah','order'=>3],
            ['code'=>'03','name'=>'KANTOR CABANG BANTARKALONG','shortname'=>'BTK','address'=>'Bantarkalong','order'=>4],
            ['code'=>'04','name'=>'KANTOR CABANG BOJONGGAMBIR','shortname'=>'BJG','address'=>'Bojonggambir','order'=>5]
        ]);
    }
}
