<?php
namespace App\Services;

use App\Sekolah;
use App\Repositories\SekolahRepository;

class SekolahService
{
    protected $sekolahRepository;

    public function __construct(SekolahRepository $sekolahRepository)
    {
        $this->sekolahRepository = $sekolahRepository;
    }

    public function getAll()
    {
        return $this->sekolahRepository->index();
    }
    public function store($request)
    {
        return $this->sekolahRepository->store($request);
    }
    public function showDetail($id)
    {
        return $this->sekolahRepository->show($id);
    }
    public function edit($id)
    {
        return $this->sekolahRepository->show($id);
    }
    public function update($request, $id)
    {
        return $this->sekolahRepository->update($request, $id);
    }
    public function delete($id)
    {
        return $this->sekolahRepository->delete($id);
    }
    public function count()
    {
        return $this->sekolahRepository->count();
    }
    public function getNamaSekolah()
    {
        $sekolah =  $this->sekolahRepository->countWithSantri();
        $nama_sekolah = $sekolah->map(function($item,$key){
            if ($item->santris_count>0) {
                return $item->nama;
            }
        });
        return $nama_sekolah;
    }
    public function getJumlahSantri()
    {
        $sekolah =  $this->sekolahRepository->countWithSantri();
        $jumlah = $sekolah->map(function($item,$key){
            if ($item->santris_count>0) {
                return $item->santris_count;
            }
        });
        return $jumlah;
    }

    public function getJumlahSantriPerSekolah()
    {
        $sekolah = [
            'nama' => $this->getNamaSekolah(),
            'jumlah' => $this->getJumlahSantri()
        ];
        return $sekolah;
    }
}
    
