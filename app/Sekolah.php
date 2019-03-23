<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    protected $guarded=['id'];

    public function santris()
    {
        return $this->hasMany('App\Santri');
    }
}
