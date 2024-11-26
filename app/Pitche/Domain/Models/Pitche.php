<?php

namespace App\Pitche\Domain\Models;

use App\Stadium\Domain\Models\Stadium;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Pitche extends Model implements TranslatableContract
{
    use Translatable;

    protected $guarded = [];
    public $translatedAttributes = ['name'];

    public function stadium()
    {
        return $this->belongsTo(Stadium::class);
    }
}
