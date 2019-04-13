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
    public function materis()
    {
        return $this->belongsToMany('App\Materi','materi_ujians');
    }

    
    public function peserta_ujian()
    {
        return $this->belongsToMany('App\Santri', 'tes')->orderBy('id','asc');
    }
}
