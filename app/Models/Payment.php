<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    public function sponsorChild()
    {
        return $this->belongsTo(SponsorChild::class, 'sponsor_child_id', 'id');
    }
}
