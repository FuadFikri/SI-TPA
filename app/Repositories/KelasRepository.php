<?php

namespace App\Repositories;
use App\Kelas;
use Illuminate\Database\Eloquent\Model;
class KelasRepository
{
    protected $model;

    public function __construct(Kelas $kelas)
    {
        $this->model = $kelas;
    }

    public function index()
    {
        return $this->model::All();;
    }

    public function store($request)
    {
        $data = $this->data($request);
        $newKelas = $this->model::create($data);
        return $newKelas;
    }

    public function update($request,$id)
    {
        $kelas = $this->model::find($id);
        $data = $this->data($request);
        $kelas->update($data);
        return $kelas;
    }

    public function show($id)
    {
        $kelas = $this->model::find($id);
        return $kelas;
    }
    public function delete($id)
    {
        $kelas = $this->model::find($id);
        $kelas->destroy();
        return $kelas;
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
}

