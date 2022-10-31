<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['name'=>'admindev1','fullname'=>'admindev1','email'=>'admindev1@gmail.com','phone'=>'6281296025268','role_id'=>1,'office_id'=>1,'departement_id'=>1,'password'=>bcrypt('123456'),'image'=>'img/users/avatar-1.png'],
            ['name'=>'admindev2','fullname'=>'admindev2','email'=>'admindev2@gmail.com','phone'=>'6281296025268','role_id'=>1,'office_id'=>2,'departement_id'=>1,'password'=>bcrypt('123456'),'image'=>'img/users/avatar-1.png'],
            ['name'=>'admindev3','fullname'=>'admindev3','email'=>'admindev3@gmail.com','phone'=>'6281296025268','role_id'=>1,'office_id'=>3,'departement_id'=>1,'password'=>bcrypt('123456'),'image'=>'img/users/avatar-1.png'],
            ['name'=>'admindev4','fullname'=>'admindev4','email'=>'admindev4@gmail.com','phone'=>'6281296025268','role_id'=>1,'office_id'=>4,'departement_id'=>1,'password'=>bcrypt('123456'),'image'=>'img/users/avatar-1.png'],
            ['name'=>'admindev5','fullname'=>'admindev5','email'=>'admindev5@gmail.com','phone'=>'6281296025268','role_id'=>1,'office_id'=>5,'departement_id'=>1,'password'=>bcrypt('123456'),'image'=>'img/users/avatar-1.png'],
            
            
            //user
            ['name'=>'Acep','fullname'=>'Acep Yoga','email'=>'acep@test.test','phone'=>'6281296025268','role_id'=>8,'office_id'=>1,'departement_id'=>1,'password'=>bcrypt('123456'),'image'=>'img/users/avatar-1.png'],
            ['name'=>'Agra','fullname'=>'Agra Agus Maulana','email'=>'agra@test.test','phone'=>'6281296025268','role_id'=>2,'office_id'=>4,'departement_id'=>1,'password'=>bcrypt('123456'),'image'=>'img/users/avatar-1.png'],
            ['name'=>'Aiema','fullname'=>'Ai Ema Rismawati','email'=>'aiema@test.test','phone'=>'6281296025268','role_id'=>2,'office_id'=>4,'departement_id'=>1,'password'=>bcrypt('123456'),'image'=>'img/users/avatar-1.png'],
            ['name'=>'Ajis','fullname'=>'Ajis Mulyana','email'=>'ajis@test.test','phone'=>'6281296025268','role_id'=>3,'office_id'=>3,'departement_id'=>1,'password'=>bcrypt('123456'),'image'=>'img/users/avatar-1.png'],
            ['name'=>'Angga','fullname'=>'Angga Pratama Suhariandri','email'=>'angga@test.test','phone'=>'6281296025268','role_id'=>4,'office_id'=>1,'departement_id'=>1,'password'=>bcrypt('123456'),'image'=>'img/users/avatar-1.png'],
            ['name'=>'Anggi','fullname'=>'Anggi Juandya Giri','email'=>'anggi@test.test','phone'=>'6281296025268','role_id'=>4,'office_id'=>5,'departement_id'=>1,'password'=>bcrypt('123456'),'image'=>'img/users/avatar-1.png'],
            ['name'=>'Aris','fullname'=>'Aris Latif Riswanto','email'=>'aris@test.test','phone'=>'6281296025268','role_id'=>5,'office_id'=>3,'departement_id'=>1,'password'=>bcrypt('123456'),'image'=>'img/users/avatar-1.png'],
            ['name'=>'Asepper','fullname'=>'ASEP PERMANA','email'=>'asepper@test.test','phone'=>'6281296025268','role_id'=>3,'office_id'=>4,'departement_id'=>1,'password'=>bcrypt('123456'),'image'=>'img/users/avatar-1.png'],
            ['name'=>'Asepsetia','fullname'=>'Asep Setia Wijaya','email'=>'asepsetia@test.test','phone'=>'6281296025268','role_id'=>3,'office_id'=>2,'departement_id'=>1,'password'=>bcrypt('123456'),'image'=>'img/users/avatar-1.png'],
            ['name'=>'Bahrul','fullname'=>'Bahrul Falah','email'=>'bahrul@test.test','phone'=>'6281296025268','role_id'=>3,'office_id'=>3,'departement_id'=>1,'password'=>bcrypt('123456'),'image'=>'img/users/avatar-1.png'],
            ['name'=>'Budi','fullname'=>'Budi Riyanto','email'=>'budi@test.test','phone'=>'6281296025268','role_id'=>3,'office_id'=>2,'departement_id'=>1,'password'=>bcrypt('123456'),'image'=>'img/users/avatar-1.png'],
            ['name'=>'Danis','fullname'=>'Dani Sutisna','email'=>'danis@test.test','phone'=>'6281296025268','role_id'=>3,'office_id'=>5,'departement_id'=>1,'password'=>bcrypt('123456'),'image'=>'img/users/avatar-1.png'],
            ['name'=>'Daniset','fullname'=>'Dani Setiawan','email'=>'daniset@test.test','phone'=>'6281296025268','role_id'=>3,'office_id'=>2,'departement_id'=>1,'password'=>bcrypt('123456'),'image'=>'img/users/avatar-1.png'],
            ['name'=>'Deri','fullname'=>'Deri','email'=>'deri@test.test','phone'=>'6281296025268','role_id'=>3,'office_id'=>5,'departement_id'=>1,'password'=>bcrypt('123456'),'image'=>'img/users/avatar-1.png'],
            ['name'=>'Devi','fullname'=>'Devi Kurniawati','email'=>'devi@test.test','phone'=>'6281296025268','role_id'=>2,'office_id'=>3,'departement_id'=>1,'password'=>bcrypt('123456'),'image'=>'img/users/avatar-1.png'],
            ['name'=>'Devian','fullname'=>'Devian Budiana','email'=>'devian@test.test','phone'=>'6281296025268','role_id'=>3,'office_id'=>3,'departement_id'=>1,'password'=>bcrypt('123456'),'image'=>'img/users/avatar-1.png'],
            ['name'=>'Dian','fullname'=>'Dian Subakti','email'=>'dian@test.test','phone'=>'6281296025268','role_id'=>8,'office_id'=>1,'departement_id'=>1,'password'=>bcrypt('123456'),'image'=>'img/users/avatar-1.png'],
            ['name'=>'Drika','fullname'=>'Drika Septiana','email'=>'drika@test.test','phone'=>'6281296025268','role_id'=>3,'office_id'=>4,'departement_id'=>1,'password'=>bcrypt('123456'),'image'=>'img/users/avatar-1.png'],
            ['name'=>'Egiyunar','fullname'=>'Egi Yunar','email'=>'egiyunar@test.test','phone'=>'6281296025268','role_id'=>3,'office_id'=>4,'departement_id'=>1,'password'=>bcrypt('123456'),'image'=>'img/users/avatar-1.png'],
            ['name'=>'Enung','fullname'=>'Enung Nurhayati','email'=>'enung@test.test','phone'=>'6281296025268','role_id'=>7,'office_id'=>1,'departement_id'=>1,'password'=>bcrypt('123456'),'image'=>'img/users/avatar-1.png'],
            ['name'=>'Erikh','fullname'=>'Erik Herikandi','email'=>'erikh@test.test','phone'=>'6281296025268','role_id'=>7,'office_id'=>1,'departement_id'=>1,'password'=>bcrypt('123456'),'image'=>'img/users/avatar-1.png'],
            ['name'=>'Esa','fullname'=>'Esa Lorenda','email'=>'esa@test.test','phone'=>'6281296025268','role_id'=>3,'office_id'=>2,'departement_id'=>1,'password'=>bcrypt('123456'),'image'=>'img/users/avatar-1.png'],
            ['name'=>'Faridl','fullname'=>'Faridl Azis Muslim','email'=>'faridl@test.test','phone'=>'6281296025268','role_id'=>5,'office_id'=>4,'departement_id'=>1,'password'=>bcrypt('123456'),'image'=>'img/users/avatar-1.png'],
            ['name'=>'Guruhps','fullname'=>'Guruh Pradila Santosa','email'=>'guruhps@test.test','phone'=>'6281296025268','role_id'=>3,'office_id'=>3,'departement_id'=>1,'password'=>bcrypt('123456'),'image'=>'img/users/avatar-1.png'],
            ['name'=>'Hermawan','fullname'=>'Hermawan','email'=>'hermawan@test.test','phone'=>'6281296025268','role_id'=>3,'office_id'=>4,'departement_id'=>1,'password'=>bcrypt('123456'),'image'=>'img/users/avatar-1.png'],
            ['name'=>'Hyder','fullname'=>'Hyder Arjian Givari','email'=>'hyder@test.test','phone'=>'6281296025268','role_id'=>3,'office_id'=>4,'departement_id'=>1,'password'=>bcrypt('123456'),'image'=>'img/users/avatar-1.png'],
            ['name'=>'Ihsan','fullname'=>'Ihsan Tria Wirangga Kusumah','email'=>'ihsan@test.test','phone'=>'6281296025268','role_id'=>2,'office_id'=>5,'departement_id'=>1,'password'=>bcrypt('123456'),'image'=>'img/users/avatar-1.png'],
            ['name'=>'Irwan','fullname'=>'Irwan Setiaji Laksana','email'=>'irwan@test.test','phone'=>'6281296025268','role_id'=>3,'office_id'=>2,'departement_id'=>1,'password'=>bcrypt('123456'),'image'=>'img/users/avatar-1.png'],
            ['name'=>'Jajang','fullname'=>'Jajang Sutisna','email'=>'jajang@test.test','phone'=>'6281296025268','role_id'=>3,'office_id'=>2,'departement_id'=>1,'password'=>bcrypt('123456'),'image'=>'img/users/avatar-1.png'],
            ['name'=>'Jepi','fullname'=>'Jepi Mejiana','email'=>'jepi@test.test','phone'=>'6281296025268','role_id'=>3,'office_id'=>2,'departement_id'=>1,'password'=>bcrypt('123456'),'image'=>'img/users/avatar-1.png'],
            ['name'=>'Liaamel','fullname'=>'Lia Amelia Irawan','email'=>'liaamel@test.test','phone'=>'6281296025268','role_id'=>2,'office_id'=>3,'departement_id'=>1,'password'=>bcrypt('123456'),'image'=>'img/users/avatar-1.png'],
            ['name'=>'Lutfi','fullname'=>'Muhammad Lutfi Abdul Barri','email'=>'lutfi@test.test','phone'=>'6281296025268','role_id'=>3,'office_id'=>4,'departement_id'=>1,'password'=>bcrypt('123456'),'image'=>'img/users/avatar-1.png'],
            ['name'=>'Nandang','fullname'=>'Nandang Rasmana','email'=>'nandang@test.test','phone'=>'6281296025268','role_id'=>3,'office_id'=>2,'departement_id'=>1,'password'=>bcrypt('123456'),'image'=>'img/users/avatar-1.png'],
            ['name'=>'Novita','fullname'=>'Novita Triani','email'=>'novita@test.test','phone'=>'6281296025268','role_id'=>2,'office_id'=>4,'departement_id'=>1,'password'=>bcrypt('123456'),'image'=>'img/users/avatar-1.png'],
            ['name'=>'Pepen','fullname'=>'Pepen Ruspendi','email'=>'pepen@test.test','phone'=>'6281296025268','role_id'=>3,'office_id'=>3,'departement_id'=>1,'password'=>bcrypt('123456'),'image'=>'img/users/avatar-1.png'],
            ['name'=>'Putri','fullname'=>'Putri Anggi Noviawati','email'=>'putri@test.test','phone'=>'6281296025268','role_id'=>2,'office_id'=>2,'departement_id'=>1,'password'=>bcrypt('123456'),'image'=>'img/users/avatar-1.png'],
            ['name'=>'Regi','fullname'=>'REGI RUSTANDI','email'=>'regi@test.test','phone'=>'6281296025268','role_id'=>3,'office_id'=>4,'departement_id'=>1,'password'=>bcrypt('123456'),'image'=>'img/users/avatar-1.png'],
            ['name'=>'Revi','fullname'=>'Revi M Irsyad','email'=>'revi@test.test','phone'=>'6281296025268','role_id'=>3,'office_id'=>4,'departement_id'=>1,'password'=>bcrypt('123456'),'image'=>'img/users/avatar-1.png'],
            ['name'=>'Risa','fullname'=>'Risa Nita','email'=>'risa@test.test','phone'=>'6281296025268','role_id'=>2,'office_id'=>2,'departement_id'=>1,'password'=>bcrypt('123456'),'image'=>'img/users/avatar-1.png'],
            ['name'=>'Saut','fullname'=>'Saut','email'=>'saut@test.test','phone'=>'6281296025268','role_id'=>5,'office_id'=>2,'departement_id'=>1,'password'=>bcrypt('123456'),'image'=>'img/users/avatar-1.png'],
            ['name'=>'Sitizam','fullname'=>'SITI ZAMILAH MUTOHAROH','email'=>'sitizam@test.test','phone'=>'6281296025268','role_id'=>2,'office_id'=>2,'departement_id'=>1,'password'=>bcrypt('123456'),'image'=>'img/users/avatar-1.png'],
            ['name'=>'Sukma','fullname'=>'Sukma Sumarna','email'=>'sukma@test.test','phone'=>'6281296025268','role_id'=>3,'office_id'=>2,'departement_id'=>1,'password'=>bcrypt('123456'),'image'=>'img/users/avatar-1.png'],
            ['name'=>'Sukmawan','fullname'=>'Sukmawan','email'=>'sukmawan@test.test','phone'=>'6281296025268','role_id'=>3,'office_id'=>4,'departement_id'=>1,'password'=>bcrypt('123456'),'image'=>'img/users/avatar-1.png'],
            ['name'=>'Taopik','fullname'=>'Taopik Alamsyah','email'=>'taopik@test.test','phone'=>'6281296025268','role_id'=>3,'office_id'=>2,'departement_id'=>1,'password'=>bcrypt('123456'),'image'=>'img/users/avatar-1.png'],
            ['name'=>'Topik','fullname'=>'Topik Zenal Mutaqin','email'=>'topik@test.test','phone'=>'6281296025268','role_id'=>3,'office_id'=>5,'departement_id'=>1,'password'=>bcrypt('123456'),'image'=>'img/users/avatar-1.png'],
            ['name'=>'Wawand','fullname'=>'Wawan Darmawan','email'=>'wawand@test.test','phone'=>'6281296025268','role_id'=>3,'office_id'=>3,'departement_id'=>1,'password'=>bcrypt('123456'),'image'=>'img/users/avatar-1.png'],
            ['name'=>'Widiana','fullname'=>'Widiana Supriatna','email'=>'widiana@test.test','phone'=>'6281296025268','role_id'=>3,'office_id'=>4,'departement_id'=>1,'password'=>bcrypt('123456'),'image'=>'img/users/avatar-1.png'],
            ['name'=>'Yadic','fullname'=>'Yadi Cahyadi','email'=>'yadic@test.test','phone'=>'6281296025268','role_id'=>3,'office_id'=>3,'departement_id'=>1,'password'=>bcrypt('123456'),'image'=>'img/users/avatar-1.png'],
            ['name'=>'Yana','fullname'=>'Yana Riana','email'=>'yana@test.test','phone'=>'6281296025268','role_id'=>3,'office_id'=>3,'departement_id'=>1,'password'=>bcrypt('123456'),'image'=>'img/users/avatar-1.png'],
            ['name'=>'Yoga','fullname'=>'Yoga Alfian','email'=>'yoga@test.test','phone'=>'6281296025268','role_id'=>4,'office_id'=>1,'departement_id'=>1,'password'=>bcrypt('123456'),'image'=>'img/users/avatar-1.png']
        ]);
    }
}
