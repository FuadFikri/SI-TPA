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

    public function santri_sudah_ujian()
    {
        return $this->belongsToMany('App\Santri','tes')->withPivot('nilai','deskripsi','penguji');
    }

    public function ujians(){
        return $this->hasMany('App\Ujian','materi_ujians');
    }

    public function tes(){
        return $this->hasMany('App\Tes');
    }
}
