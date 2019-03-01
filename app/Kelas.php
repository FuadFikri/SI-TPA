<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    public function santris()
    {
        return $this->hasMany('App\Santri');
    }
    public function materis()
    {
        return $this->hasMany('App\Materi');
    }
}
