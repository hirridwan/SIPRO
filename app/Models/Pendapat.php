<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Rapat;
use App\Models\Pegawai;

class Pendapat extends Model
{
    use HasFactory;

    protected $table='pendapat';
    protected $guarded = [];
    protected $primaryKey = 'id';

    public function rapat()
    {
        return $this->belongsTo(Rapat::class,'rapat_id');
    }

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class,'pegawai_id');
    }
}
