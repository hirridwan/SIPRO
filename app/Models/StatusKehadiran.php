<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PesertaRapat;

class StatusKehadiran extends Model
{
    use HasFactory;

    protected $table = 'status_kehadiran';
    protected $guarded = [];
    protected $primaryKey = 'id';


    public function peserta_rapat()
    {
        return $this->belongsToMany(PesertaRapat::class,'id','status_kehadiran_id');
    }
}
