<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tes extends Model
{
    public function ujian()
    {
        return $this->belongsTo('App\Ujian');
    }
}
