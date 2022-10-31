<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pegawai;

class Jabatan extends Model
{
    use HasFactory;
    
    protected $table = 'jabatan';
    protected $guarded = [];
    protected $primaryKey = 'id';

    public function pegawai()
    {
        return $this->belongsToMany(Pegawai::class,'id','jabatan_id');
    }

}
