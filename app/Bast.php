<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bast extends Model
{
    public function vm(){
        return $this->belongsToMany(AlokasiHostname::class);
    }
}
