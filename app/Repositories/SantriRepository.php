<?php

namespace App\Repositories;
use App\Santri;
use Illuminate\Database\Eloquent\Model;
class SantriRepository
{
    protected $model;

    public function __construct(Santri $santri)
    {
        $this->model = $santri;
    }
    public function index()
    {
        return $this->model::all();
    }

    public function store($request)
    {
        $data = $this->data($request);
        $newSantri = $this->model::create($data);
        return $newSantri;
    }

    public function update($request,$id)
    {
        $santri = $this->model::findOrFail($id);
        $data = $this->data($request);
        $santri->update($data);
        return $santri;
    }

    public function show($id)
    {
        $santri = $this->model::findOrFail($id);
        return $santri;
    }
    public function delete($id)
    {
        $santri = $this->model::findOrFail($id);
        $santri->delete();
        return $santri;
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

    
}

