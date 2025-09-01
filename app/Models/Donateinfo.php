<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donateinfo extends Model
{
    protected $fillable = ['name', 'account', 'dnumber', 'rnumber', 'txnid', 'subject', 'message', 'donation_id'];
    public function donation()
    {
        return $this->belongsTo(Donations::class, 'donation_id', 'id');
    }
}
