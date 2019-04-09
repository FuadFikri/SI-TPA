<?php

namespace App\Repositories;
use App\Santri;
use Illuminate\Database\Eloquent\Model;
class SantriRepository extends CrudRepository
{
    protected $model;

    public function __construct(Santri $santri)
    {
        $this->model = $santri;
    }
    public function data($request)
    {
        $data = ['nama_lengkap' => $request->nama_lengkap,
                'nama_panggilan' => $request->nama_panggilan,
                'tgl_lahir' => $request->tgl_lahir,
                'RT' => $request->RT,
                'RW' => $request->RW,
                'no_rumah' => $request->no_rumah,
                'sekolah_id' => $request->sekolah,
                'tahun_masuk_tpa' => $request->thn_masuk,
                'nama_orang_tua' => $request->wali,
                'jenis_kelamin' => $request->jenis_klm,
                'kelas_id' => $request->kls_tpa,
                'isActive' => $request->isActive
        ];
        return $data;
    }

    public function uploadFoto($request)
    {
        if($request->file('avatar')){
            $file = $request->file('avatar')->store('avatars', 'public');
            return $file;
        }
        return null;
        
    }

    public function getAllSantriAktif(){
        return $this->model::where('isActive',1)->get();
    }
    
    public function countSantriByGender()
    {
        return $this->model::all()->groupBy('jenis_kelamin');
    }

    public function countSantriByIsActive()
    {
        return $this->model::all()->groupBy('isActive');
    }
    public function countSantriByRT()
    {
        return $this->model::all()->groupBy('RT');
    }
}

