<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tes extends Model
{
    protected $guarded =['id'];
    public function ujian()
    {
        return $this->belongsTo('App\Ujian');
    }
}
