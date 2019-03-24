<?php

namespace App\Repositories;
use App\Kelas;
use Illuminate\Database\Eloquent\Model;
class KelasRepository extends CrudRepository
{
    protected $model;

    public function __construct(Kelas $kelas)
    {
        $this->model = $kelas;
    }

    public function data($request)
    {
        $data = [
            'nama' => $request->nama_kelas,
            'ketentuan' => $request->ketentuan
        ];
        return $data;
    }
}

