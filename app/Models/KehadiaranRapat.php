<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pegawai;
use App\Models\Rapat;

class KehadiaranRapat extends Model
{
    use HasFactory;
    protected $table ='kehadiran_rapat';
    protected $guarded = [];
    protected $primaryKey = 'id';
    
}
