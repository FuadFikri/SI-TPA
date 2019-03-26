<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    public function kelas()
    {
        return $this->belongsTo('App\Kelas');
    }

    public function santris()
    {
        return $this->belongsToMany('App\Santri','tes');
    }

    public function ujian(){
        return $this->belongsTo('App\Ujian');
    }
}
