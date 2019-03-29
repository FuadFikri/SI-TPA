<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    protected $guarded = ['id'];
    public function kelas()
    {
        return $this->belongsTo('App\Kelas');
    }

    public function santris()
    {
        return $this->belongsToMany('App\Santri','tes');
    }

    public function ujians(){
        return $this->hasMany('App\Ujian','materi_ujians');
    }
}
