<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\hash;
use Illuminate\Support\Str;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert([
            ['name'=>'Dashboard','route_name'=>'','icon'=>'fas fa-tachometer-alt','parent_id'=>0,'is_active'=>1],
            ['name'=>'Restruk','route_name'=>'','icon'=>'fas fa-hands-helping','parent_id'=>0,'is_active'=>1],
            ['name'=>'Data Restruk','route_name'=>'restruk','icon'=>'','parent_id'=>2,'is_active'=>1],
            ['name'=>'Report','route_name'=>'','icon'=>'far fa-file-alt','parent_id'=>0,'is_active'=>1],
            ['name'=>'Setup','route_name'=>'','icon'=>'fas fa-wrench','parent_id'=>0,'is_active'=>1],
            ['name'=>'Setup User','route_name'=>'users','icon'=>'','parent_id'=>5,'is_active'=>1],
            ['name'=>'Setup Role','route_name'=>'setup.roles','icon'=>'','parent_id'=>5,'is_active'=>1],
            ['name'=>'Setup Kantor','route_name'=>'setup.offices','icon'=>'','parent_id'=>5,'is_active'=>1],
            ['name'=>'Setup Menu','route_name'=>'setup.menus','icon'=>'','parent_id'=>5,'is_active'=>1],
            ['name'=>'Dashboard','route_name'=>'dashboard','icon'=>'','parent_id'=>1,'is_active'=>1],
            ['name'=>'Data','route_name'=>'','icon'=>'fas fa-database','parent_id'=>0,'is_active'=>1],
            ['name'=>'Data Nasabah','route_name'=>'data.nasabah','icon'=>'','parent_id'=>11,'is_active'=>1],
            ['name'=>'Data Kredit','route_name'=>'data.kredit','icon'=>'','parent_id'=>11,'is_active'=>1],
            ['name'=>'Data Agunan','route_name'=>'data.agunan','icon'=>'','parent_id'=>11,'is_active'=>1],
            ['name'=>'Analisa Keuangan','route_name'=>'data.financial-analysis','icon'=>'','parent_id'=>11,'is_active'=>1],
            ['name'=>'Notulen','route_name'=>null,'icon'=>'fas fa-pen-alt','parent_id'=>null,'is_active'=>1],
            ['name'=>'Rapat','route_name'=>'notulen.rapat','icon'=>'','parent_id'=>16,'is_active'=>1],
            ['name'=>'Data Pegawai','route_name'=>'data.pegawai','icon'=>'','parent_id'=>11,'is_active'=>1],
        ]);
    }
}
