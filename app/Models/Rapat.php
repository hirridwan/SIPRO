<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pegawai;
use App\Models\PesertaRapat;
use App\Models\Office;
use App\Models\Pendapat;

class Rapat extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table = 'rapat';
    protected $guarded = [];
    protected $primaryKey = 'id';

    public function peserta()
    {
        return $this->belongsToMany(Pegawai::class,'peserta_rapat','rapat_id','pegawai_id');
    }

    public function pendapat()
    {
        return $this->hasMany(Pendapat::class,'rapat_id');
    }

    public function kehadiran()
    {
        return $this->belongsToMany(Pegawai::class,'kehadiran','rapat_id','pegawai_id');
    }

    public function notulis()
    {
        return $this->belongsTo(Pegawai::class,'notulis_id','id');
    }
}
