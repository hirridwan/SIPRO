<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\hash;
use Illuminate\Support\Str;

class CollateralTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('collateral_types')->insert([
            ['code'=>'01','name'=>'SBN/SPN/ON/ORI'],
            ['code'=>'02','name'=>'TABUNGAN/DEPOSITO'],
            ['code'=>'03','name'=>'LOGAM MULIA'],
            ['code'=>'04','name'=>'PERHIASAN EMAS'],
            ['code'=>'05','name'=>'TANAH / BANGUNAN - SHM DGN HT'],
            ['code'=>'06','name'=>'TANAH / BANGUNAN - SHM NON HT'],
            ['code'=>'07','name'=>'TANAH / BANGUNAN - SURAT GIRIK/LETTER-C/AJB+SPPT/SHM'],
            ['code'=>'08','name'=>'TANAH / BANGUNAN - KIOS PASAR + SKM NOTARIEL'],
            ['code'=>'09','name'=>'RESI GUDANG'],
            ['code'=>'10','name'=>'KENDARAAN / KAPAL - FIDUCIA'],
            ['code'=>'11','name'=>'KENDARAAN / KAPAL - NOTARIEL'],
            ['code'=>'12','name'=>'KENDARAAN / KAPAL - LAINNYA'],
            ['code'=>'13','name'=>'BAGIAN DANA YG DIJAMIN BUMN/BUMD'],
            ['code'=>'14','name'=>'LAINNYA : SK/IJAZAH'],
            ['code'=>'15','name'=>'LAINNYA : SAHAM'],
            ['code'=>'16','name'=>'LAINNYA : REKSADANA'],
            ['code'=>'17','name'=>'LAINNYA : PERSEDIAAN'],
            ['code'=>'18','name'=>'LAIN-LAIN'],
            ['code'=>'99','name'=>'TANPA AGUNAN'],
        ]);
    }
}
