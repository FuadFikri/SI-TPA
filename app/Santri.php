<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Santri extends Model
{
    protected $guarded=[];
    
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
    public function Ujians()
    {
        return $this->hasMany('App\Ujian','tes','santri_id','ujian_id');
    }


}
