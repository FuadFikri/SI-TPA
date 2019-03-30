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
    public function materi()
    {
        return $this->belongsTo('App\Materi');
    }
}
