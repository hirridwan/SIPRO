<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UnitKerja;

class UnitKerja extends Model
{
    use HasFactory;

    protected $table = 'unit_kerja';
    protected $guarded = [];
    protected $primaryKey = 'id';

    public function pegawai()
    {
        return $this->belongsToMany(Pegawai::class,'id','unit_kerja_id');
    }
}