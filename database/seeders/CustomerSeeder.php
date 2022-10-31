<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\hash;
use Illuminate\Support\Str;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            ['cif'=>'01.1.49275',
            'office_code'=>'01',
            'name'=>'ABAD',
            'address'=>'LEUWIPICUNG RT/RW 006/001',
            'kota_kab_code'=>10,
            'kecamatan'=>'CIPATUJAH',
            'desa'=>'KERTASARI',
            'postal_code'=>'46189',
            'identity_id'=>'3206010808870003',
            'birth_place'=>'TASIKMALAYA',
            'birth_date'=>'1987-08-08',
            'job_type_id'=>13,
            'job_description'=>'WIRASWASTA',
            'marital_status_id'=>2]
        ]);
    }
}
