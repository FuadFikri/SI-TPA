<?php
namespace App\Services;

use App\Kelas;
use App\Repositories\KelasRepository;

class KelasService
{
    protected $kelasRepository;

    public function __construct(KelasRepository $kelasRepository)
    {
        $this->kelasRepository = $kelasRepository;
    }

    public function getAll()
    {
        return $this->kelasRepository->index();
    }

    public function store($request)
    {
        return $this->kelasRepository->store($request);
    }
    public function showDetail($id)
    {
        return $this->kelasRepository->show($id);
    }
    public function edit($id)
    {
        return $this->kelasRepository->show($id);
    }
    public function update($request, $id)
    {
        return $this->kelasRepository->update($request, $id);
        
    }
    public function delete($id)
    {
        return $this->kelasRepository->delete($id);
    }
    public function count()
    {
        return $this->kelasRepository->count();
    }

    public function getNamaKelas()
    {
        $kelas =  $this->kelasRepository->countWithSantri();
        $nama_kelas = $kelas->map(function($item,$key){
            if ($item->santris_count>0) {
                return $item->nama;
            }
        });
        return $nama_kelas;
    }
    public function countSantri()
    {
        $kelas =  $this->kelasRepository->countWithSantri();
        $jumlah = $kelas->map(function($item,$key){
            if ($item->santris_count>0) {
                return $item->santris_count;
            }
        });
        return $jumlah;
    }
    public function countSantriByKelas()
    {
        $kelas = [
            'nama' => $this->getNamaKelas(),
            'jumlah' => $this->countSantri()
        ];
        return $kelas;
    }

}
