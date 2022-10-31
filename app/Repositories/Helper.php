<?php

namespace App\Repositories;
use Carbon\Carbon;
use QrCode;

class Helper
{

    public function toDecimalFormat($nominal)
    {
        $decimalFormat = str_replace(',','.',str_replace('.','',$nominal));

        return $decimalFormat;
    }

    public function toRupiahFormat($nominal,$belakangKoma)
    {
        $rupiahFormat = number_format($nominal,$belakangKoma,',','.');
        return $rupiahFormat;
    }

    public function getRegisterNumber($lastNumber,$officeCode,$requestDate)
    {
        if(intval($lastNumber) < 100 && intval($lastNumber)>10)
        {
            $number = '0'.intval($lastNumber)+1;
        }elseif(intval($lastNumber)<10){
            $number = '00'.intval($lastNumber)+1;
        }
        $date = Carbon::createFromFormat('Y-m-d',$requestDate);
        if($officeCode!='01')
        {
            $requestNumber = $number.'/'.'Restruk/'.'KC-'.$officeCode.'/'.$date->format("m").'/'.$date->format('Y');
        }else{
            $requestNumber = $number.'/'.'Restruk/'.'KPO'.'/'.$date->format("m").'/'.$date->format('Y');
        }
        return $requestNumber;
    }

    public function createNomorAnalisa($reg_number,$analysis_count)
    {
        if(intval($analysis_count)<10)
        {
            $count = '00'.intval($analysis_count)+1;
        }
        $analysis_code = $reg_number."/ANL/".$count;

        return $analysis_code;
    }

    public function createNoRegistrasiRapat($lastNumber,$requestDate)
    {
        if(intval($lastNumber+1) <100 && intval($lastNumber+1)>=10)
        {
            $number = '0'.intval($lastNumber)+1;
        }elseif(intval($lastNumber+1)<10){
            $number = '00'.intval($lastNumber)+1;
        }else{
            $number = intval($lastNumber)+1;
        }
        $date = Carbon::createFromFormat('Y-m-d',$requestDate);
        $noRegistrasiRapat = $number.'RPTCIJ'.$date->format("m").$date->format('Y').$this->getRandomString(4).$this->getRandomString(4);
        return $noRegistrasiRapat;
    }

    public function getRandomString($length)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
    
        for ($i = 0; $i < $length; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }
    
        return $randomString;
    }

    public function getDocumentCode($code)
    {
        $code = explode('-',$code);
        return $code[0];
    }


    public function bulanID($bulan)
    {
        $namaBulan=Array(
            'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember',
        );
        return $namaBulan[intval($bulan)-1];
    }

    public function hariID($day)
    {
        $namaHari=Array(
            'Mon'=>'Senin',
            'Tue'=>'Selasa',
            'Wed'=>'Rabu',
            'Thu'=>'Kamis',
            'Fri'=>'Jumat',
            'Sat'=>'Sabtu',
            'Sun'=>'Minggu'
        );
        return $namaHari[$day];
    }

    public function getWaktuRapat($date)
    {
        $date = Carbon::createFromFormat('Y-m-d',$date);

        $hari = $this->hariID($date->format('D'));
        $tanggal = $date->format('d');
        $bulan = $this->bulanID($date->format('m'));
        $tahun = $date->format('Y');

        return $hari.", ".$tanggal." ".$bulan." ".$tahun;
    }

    public static function generateImageQr($url)
    {
        $qrcode = QrCode::format('png')
                    ->merge('img/logoweb.png',0.5,true)
                    ->size(300)->errorCorrection('H')
                    ->generate($url);
    }

    public function toBase64($path)
    {
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

        return $base64;
    }
}