<?php

namespace App\Repositories;
use App\Ujian;
use Illuminate\Database\Eloquent\Model;
class UjianRepository
{
    protected $model;

    public function __construct(Ujian $ujian)
    {
        $this->model = $ujian;
    }
    public function index()
    {
        return $this->model::all();
    }

    public function store($request)
    {
        $data = $this->data($request);
        $newUjian = $this->model::create($data);
        return $newUjian;
    }

    public function update($request,$id)
    {
        $ujian = $this->model::find($id);
        $data = $this->data($request);
        $ujian->update($data);
        return $ujian;
    }

    public function show($id)
    {
        $ujian = $this->model::find($id);
        return $ujian;
    }
    public function delete($id)
    {
        $ujian = $this->model::find($id);
        $ujian->destroy();
        return $ujian;
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

    public function uploadFoto($request)
    {
        if($request->file('avatar')){
            $file = $request->file('avatar')->store('avatars', 'public');
            return $file;
        }
        return null;
        
    }

    
}

