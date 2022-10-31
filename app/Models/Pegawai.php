<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Rapat;
use App\Models\User;
use App\Models\Jabatan;
use App\Models\Bagian;
use App\Models\UnitKerja;
use App\Models\Office;
use App\Models\Pendapat;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'pegawai';
    protected $guarded = [];
    protected $primaryKey = 'id';

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function office()
    {
        return $this->belongsTo(Office::class,'office_code','code');
    }

    public function rapat()
    {
        return $this->belongsToMany(Rapat::class,'peserta_rapat','pegawai_id','rapat_id');
    }

    public function pendapat()
    {
        return $this->hasMany(Pendapat::class,'pegawai_id');
    }

    public function kehadiran()
    {
        return $this->belongsToMany(Rapat::class,'kehadiran_rapat','pegawai_id','rapat_id');
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class,'jabatan_id','id');
    }

    public function bagian()
    {
        return $this->belongsTo(Bagian::class,'bagian_id','id');
    }

    public function unit_kerja()
    {
        return $this->belongsTo(UnitKerja::class,'unit_kerja_id','id');
    }

    public function notulis_rapat()
    {
        return $this->belongsToMany(Rapat::class,'id','notulis_id');
    }
}
