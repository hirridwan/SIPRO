<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\hash;
use Illuminate\Support\Str;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            ['description'=>'Admin Sistem','shortname'=>'admin','authority_level'=>99],
            ['description'=>'Admin Kredit','shortname'=>'Admin Kredit','authority_level'=>1],
            ['description'=>'Account Officer','shortname'=>'AO','authority_level'=>2],
            ['description'=>'Kasie','shortname'=>'Kasie','authority_level'=>3],
            ['description'=>'Kepala Bagian','shortname'=>'Kabag','authority_level'=>4],
            ['description'=>'Pemimpin Cabang','shortname'=>'Pinca','authority_level'=>5],
            ['description'=>'Kepala Bagian KPM','shortname'=>'Kabag','authority_level'=>6],
            ['description'=>'Kepala Divisi','shortname'=>'Kadiv','authority_level'=>7],
            ['description'=>'Direktur','shortname'=>'Direktur','authority_level'=>8],
            ['description'=>'Direktur Utama','shortname'=>'Dirut','authority_level'=>9],
        ]);
    }
}
