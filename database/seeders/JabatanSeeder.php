<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jabatan')->insert([
            ['nama'=>'Staf','singkatan'=>'Staf','level'=>1],
            ['nama'=>'Kepala Seksi','singkatan'=>'Kasie','level'=>2],
            ['nama'=>'Kepala Bagian','singkatan'=>'Kabag','level'=>3],
            ['nama'=>'Kepala Divisi','singkatan'=>'Kadiv','level'=>4],
            ['nama'=>'Pejabat Eksekutif','singkatan'=>'PE','level'=>4],
            ['nama'=>'Direktur','singkatan'=>'Direktur','level'=>5],
            ['nama'=>'Direktur Utama','singkatan'=>'Dirut','level'=>6],
            ['nama'=>'Komisaris','singkatan'=>'Komisaris','level'=>7],
            ['nama'=>'Komisaris Utama','singkatan'=>'Komut','level'=>8],
        ]);
    }
}
