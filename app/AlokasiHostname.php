<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlokasiHostname extends Model
{
    public function bast(){
        return $this->belongsToMany('App\Bast'); 
    }
}
