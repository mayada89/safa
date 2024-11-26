<?php

namespace App\Stadium\Domain\Models;

use App\Pitche\Domain\Models\Pitche;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Stadium extends Model implements TranslatableContract
{
    use Translatable;

    protected $table = "stadiums";
    protected $guarded = [];
    public $translatedAttributes = ['name'];

    public function pitches()
    {
        return $this->hasMany(Pitche::class);
    }
}
