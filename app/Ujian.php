<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ujian extends Model
{
    protected $guarded=[""];

    public function tes()
    {
        return $this->hasMany('App\Tes');
    }
}
