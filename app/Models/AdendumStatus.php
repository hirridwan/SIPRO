<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AdendumRequest;

class AdendumStatus extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function adendum_requests()
    {
        return $this->belongsToMany(AdendumRequest::class);
    }

}
