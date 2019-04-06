<?php

namespace App\Repositories;
use App\Sekolah;
use Illuminate\Database\Eloquent\Model;
class SekolahRepository extends CrudRepository
{
    protected $model;

    public function __construct(Sekolah $sekolah)
    {
        $this->model = $sekolah;
    }
    public function data($request)
    {
        $data = [
            'nama' => $request->nama_sekolah,
            'jenjang' => $request->jenjang,
        ];
        return $data;
    }

    public function countWithSantri(){
        return $this->model::whereHas('santris')->withCount('santris')->get();
    }
}

