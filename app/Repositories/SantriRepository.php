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
    public function getPaginate($num)
    {
        return $this->model::simplePaginate($num);
            
    }

    public function store($request)
    {
        $newSantri = $this->model::insert([
            'nama_lengkap' => $request->nama_lengkap,
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
            'isActive' => 1,
        ]);
        return $newSantri;
    }

    public function update($request)
    {
        $santri = $this->model::find($request->id);
        dd($santri);
    }

    public function show($id)
    {
        $santri = $this->model::find($id);
        return $santri;
    }
    public function delete($id)
    {
        $santri = $this->model::find($id);
        $santri->destroy();
        return $santri;
    }

    
}

