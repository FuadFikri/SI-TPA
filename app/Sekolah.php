<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    public function santris()
    {
        return $this->hasMany('App\Santri');
    }
}
