<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Santri extends Model
{
    protected $guard=[''];
    public function kelas()
    {
        return $this->belongsTo('App\Kelas');
    }
    public function materis()
    {
        return $this->hasMany('App\Materi','ujians');
    }
}
