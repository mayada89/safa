<?php

namespace App\Booking\Domain\Models;

use App\Pitche\Domain\Models\Pitche;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $guarded = [];

    public function pitche()
    {
        return $this->belongsTo(Pitche::class);
    }
}
