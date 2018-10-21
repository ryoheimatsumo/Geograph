<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Room extends Model
{
    public function feelings(){
        return $this->hasMany(Feeling::class);
    }
}
