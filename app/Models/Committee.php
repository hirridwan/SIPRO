<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CommitteeStatus;
use App\Models\AdendumRequest;
use App\Models\User;

class Committee extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function commiteStatus()
    {
        return $this->belongsToMany(CommitteeStatus::class);
    }

    public function adendumRequest()
    {
        return $this->belongsTo(AdendumRequest::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
