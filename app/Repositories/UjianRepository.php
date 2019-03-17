<?php

namespace App\Repositories;
use App\Ujian;
use Illuminate\Database\Eloquent\Model;
class UjianRepository extends CrudRepository
{
    protected $model;

    public function __construct(Ujian $ujian)
    {
        $this->model = $ujian;
    }
    
    public function data($request)
    {
        $data = ['semester' => $request->semester,
                'tahun' => $request->tahun,
                'keterangan' => $request->keterangan,
                'status' => $request->status,
        ];
        return $data;
    }
}

