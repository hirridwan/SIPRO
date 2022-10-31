<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\hash;
use Illuminate\Support\Str;

class JobTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('job_types')->insert([
            ['code'=>'001','name'=>'Accounting/Finance Officer'],
            ['code'=>'002','name'=>'Customer service '],
            ['code'=>'003','name'=>'Engineering '],
            ['code'=>'004','name'=>'Eksekutif '],
            ['code'=>'005','name'=>'Administrasi umum '],
            ['code'=>'006','name'=>'Teknologi Informasi '],
            ['code'=>'007','name'=>'Konsultan/Analis '],
            ['code'=>'008','name'=>'Marketing '],
            ['code'=>'009','name'=>'Pengajar (Guru, Dosen)'],
            ['code'=>'010','name'=>'Militer'],
            ['code'=>'011','name'=>'Pensiunan '],
            ['code'=>'012','name'=>'Pelajar/Mahasiswa '],
            ['code'=>'013','name'=>'Wiraswasta '],
            ['code'=>'014','name'=>'Polisi '],
            ['code'=>'015','name'=>'Petani '],
            ['code'=>'016','name'=>'Nelayan '],
            ['code'=>'017','name'=>'Peternak '],
            ['code'=>'018','name'=>'Dokter '],
            ['code'=>'019','name'=>'Tenaga Medis (Perawat, Bidan, dsb)'],
            ['code'=>'020','name'=>'Hukum (Pengacara, Notaris)'],
            ['code'=>'021','name'=>'Perhotelan & Restoran (Koki, Bartender, dsb)'],
            ['code'=>'022','name'=>'Peneliti '],
            ['code'=>'023','name'=>'Desainer '],
            ['code'=>'024','name'=>'Arsitek '],
            ['code'=>'025','name'=>'Pekerja Seni (Artis, Musisi, Pelukis, dsb)'],
            ['code'=>'026','name'=>'Pengamanan '],
            ['code'=>'027','name'=>'Pialang/Broker '],
            ['code'=>'028','name'=>'Distributor '],
            ['code'=>'029','name'=>'Transportasi Udara (Pilot, Pramugari)'],
            ['code'=>'030','name'=>'Transportasi Laut (Nahkoda, ABK)'],
            ['code'=>'031','name'=>'Transportasi Darat (Masinis, Sopir, Kondektur)'],
            ['code'=>'032','name'=>'Buruh (Buruh Pabrik, Buruh Bangunan, Buruh Tani)'],
            ['code'=>'033','name'=>'Pertukangan & Pengrajin (Tukang Kayu, Pengrajin Kulit, dll)'],
            ['code'=>'034','name'=>'Ibu Rumah Tangga '],
            ['code'=>'035','name'=>'Pekerja Informal (Asisten Rumah Tangga, Asongan, dll)'],
            ['code'=>'036','name'=>'Pejabat Negara/Penyelenggara Negara '],
            ['code'=>'037','name'=>'Pegawai Pemerintahan/Lembaga Negara (selain Pejabat/Penyelenggara Negara) '],
            ['code'=>'099','name'=>'Lain-lain '],                     
        ]);
    }
}
