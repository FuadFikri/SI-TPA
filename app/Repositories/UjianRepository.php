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

    public function store($request)
    {
        $requestData = $this->data($request);
        $newUjian = $this->model::create($requestData);
        $newUjian->save();
        
        $newUjian->materis()->attach($request->materi_ujian);
        $newUjian->save();
        return $newUjian;
    }
}

