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

    
    public function index(){
        $daftar_sekolah = $this->model::where('id', '>' ,0 )
                                ->orderBy('created_at','desc')
                                ->paginate(5);
        return $daftar_sekolah;
    }

    public function countWithSantri(){
        return $this->model::whereHas('santris')->withCount('santris')->get();
    }
}

