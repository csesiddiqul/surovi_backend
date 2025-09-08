<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class page extends Model
{
    use HasFactory;

    public function getPage()
    {
        return  $this->belongsTo(page::class, 'id', 'manuid');
    }
}
