<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\hash;
use Illuminate\Support\Str;

class FinancialAnalysisCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('financial_analysis_codes')->insert([
            ['code'=>'1','name'=>'Aktiva','parent_code'=>'','level'=>'1','is_parent'=>'1','status'=>'1'],
            ['code'=>'101','name'=>'Aktiva Lancar','parent_code'=>'1','level'=>'2','is_parent'=>'1','status'=>'1'],
            ['code'=>'10101','name'=>'Kas','parent_code'=>'101','level'=>'3','is_parent'=>'0','status'=>'1'],
            ['code'=>'10102','name'=>'Bank','parent_code'=>'101','level'=>'3','is_parent'=>'0','status'=>'1'],
            ['code'=>'10103','name'=>'Piutang','parent_code'=>'101','level'=>'3','is_parent'=>'0','status'=>'1'],
            ['code'=>'10104','name'=>'Stok Barang','parent_code'=>'101','level'=>'3','is_parent'=>'0','status'=>'1'],
            ['code'=>'102','name'=>'Aktiva Tetap','parent_code'=>'101','level'=>'3','is_parent'=>'1','status'=>'1'],
            ['code'=>'10201','name'=>'Tanah dan Gedung','parent_code'=>'101','level'=>'3','is_parent'=>'0','status'=>'1'],
            ['code'=>'10202','name'=>'Kendaraan','parent_code'=>'101','level'=>'3','is_parent'=>'0','status'=>'1'],
            ['code'=>'10203','name'=>'Peralatan','parent_code'=>'101','level'=>'3','is_parent'=>'0','status'=>'1'],
            ['code'=>'10299','name'=>'Lain - lain','parent_code'=>'101','level'=>'3','is_parent'=>'0','status'=>'1'],
            ['code'=>'2','name'=>'Pasiva','parent_code'=>'','level'=>'1','is_parent'=>'1','status'=>'1'],
            ['code'=>'201','name'=>'Hutang Lancar','parent_code'=>'2','level'=>'2','is_parent'=>'1','status'=>'1'],
            ['code'=>'20101','name'=>'Hutang Usaha','parent_code'=>'201','level'=>'3','is_parent'=>'0','status'=>'1'],
            ['code'=>'20102','name'=>'Hutang Usaha <= 3 Tahun','parent_code'=>'201','level'=>'3','is_parent'=>'0','status'=>'1'],
            ['code'=>'20103','name'=>'Pajak Penghasilan','parent_code'=>'201','level'=>'3','is_parent'=>'0','status'=>'1'],
            ['code'=>'202','name'=>'Hutang Jangka Panjang','parent_code'=>'2','level'=>'2','is_parent'=>'1','status'=>'1'],
            ['code'=>'20201','name'=>'Hutang Usaha >= 3 Tahun','parent_code'=>'202','level'=>'3','is_parent'=>'0','status'=>'1'],
            ['code'=>'20202','name'=>'Premi Asuransi Berjangka','parent_code'=>'202','level'=>'3','is_parent'=>'0','status'=>'1'],
            ['code'=>'3','name'=>'Modal','parent_code'=>'','level'=>'1','is_parent'=>'1','status'=>'1'],
            ['code'=>'301','name'=>'Modal Awal','parent_code'=>'3','level'=>'2','is_parent'=>'2','status'=>'1'],
            ['code'=>'4','name'=>'Pendapatan','parent_code'=>'','level'=>'1','is_parent'=>'1','status'=>'1'],
            ['code'=>'401','name'=>'Omset Usaha','parent_code'=>'4','level'=>'2','is_parent'=>'0','status'=>'1'],
            ['code'=>'402','name'=>'Gaji','parent_code'=>'4','level'=>'2','is_parent'=>'1','status'=>'1'],
            ['code'=>'40201','name'=>'Gaji Pribadi','parent_code'=>'402','level'=>'3','is_parent'=>'0','status'=>'1'],
            ['code'=>'40201','name'=>'Gaji Pasangan','parent_code'=>'402','level'=>'3','is_parent'=>'0','status'=>'1'],
            ['code'=>'499','name'=>'Pendapatan Lainnya','parent_code'=>'4','level'=>'2','is_parent'=>'0','status'=>'1'],
            ['code'=>'5','name'=>'Biaya','parent_code'=>'','level'=>'1','is_parent'=>'1','status'=>'1'],
            ['code'=>'501','name'=>'Biaya Usaha','parent_code'=>'5','level'=>'2','is_parent'=>'0','status'=>'1'],
            ['code'=>'502','name'=>'Biaya Hidup','parent_code'=>'5','level'=>'2','is_parent'=>'0','status'=>'1'],
            ['code'=>'503','name'=>'Listrik','parent_code'=>'5','level'=>'2','is_parent'=>'0','status'=>'1'],
            ['code'=>'504','name'=>'Telpon','parent_code'=>'5','level'=>'2','is_parent'=>'0','status'=>'1'],
            ['code'=>'505','name'=>'Transportasi','parent_code'=>'5','level'=>'2','is_parent'=>'0','status'=>'1'],
            ['code'=>'506','name'=>'Angsuran Pinjaman','parent_code'=>'5','level'=>'2','is_parent'=>'0','status'=>'1'],
            ['code'=>'507','name'=>'Pendidikan','parent_code'=>'5','level'=>'2','is_parent'=>'0','status'=>'1'],
            ['code'=>'508','name'=>'Kesehatan','parent_code'=>'5','level'=>'2','is_parent'=>'0','status'=>'1'],
            ['code'=>'599','name'=>'Pengeluaran Lainnya','parent_code'=>'5','level'=>'2','is_parent'=>'0','status'=>'1'],

        ]);
    }
}
