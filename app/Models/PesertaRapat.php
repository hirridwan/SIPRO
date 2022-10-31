<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Rapat;
use App\Models\Pegawai;

class PesertaRapat extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table = 'peserta_rapat';
    protected $guard = [];
    protected $primaryKey = 'id';
    protected $fillable = ['rapat_id','pegawai_id'];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class,'pegawai_id','id');
    }

    public function status_kehadiran()
    {
        return $this->belongsTo(PesertaRapat::class,'status_kehadiaran_id','id');
    }
}
