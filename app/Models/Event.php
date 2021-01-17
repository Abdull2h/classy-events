<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    public function host()
    {
        return $this->belongsTo(Host::class);
    }

    public function doorman()
    {
        return $this->belongsTo(Doorman::class);
    }

    public function attendant()
    {
        return $this->hasMany(Attendant::class);
    }
}
