<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Santri extends Model
{
    protected $guard=[''];
    
    public function isActive()
    {
        return $this->isActive == 1 ? true : false ;
    }
    public function isComplete()
    {
        return $this->isComplete == 1 ? true : false ;
    }
    
    
    
    // Relationship
    public function kelas()
    {
        return $this->belongsTo('App\Kelas');
    }
    public function sekolah()
    {
        return $this->belongsTo('App\Sekolah');
    }
    public function materis()
    {
        return $this->hasMany('App\Materi','ujians');
    }


}
