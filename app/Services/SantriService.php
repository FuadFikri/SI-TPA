<?php
namespace App\Services;

use App\Santri;
use App\Repositories\SantriRepository;

class SantriService
{
    protected $santriRepository;

    public function __construct(SantriRepository $santriRepository)
    {
        $this->santriRepository = $santriRepository;
    }

    public function getAll()
    {
        return $this->santriRepository->index();
    }
    public function store($request)
    {
        return $this->santriRepository->store($request);
    }
    public function showDetail($id)
    {
        return $this->santriRepository->show($id);
    }
    public function edit($id)
    {
        return $this->santriRepository->show($id);
    }
    public function update($request, $id)
    {
        $santriUpdated = $this->santriRepository->update($request, $id);
        if ($request->avatar) {
            $santriUpdated->url_foto= $this->santriRepository->uploadFoto($request);
            $santriUpdated->save();
            return $santriUpdated;
        }
        return $santriUpdated;
    }

    public function delete($id)
    {
        return $this->santriRepository->delete($id);
    }

    public function count()
    {
        return $this->santriRepository->count();
    }
    public function getAllSantriAktif()
    {
        return $this->santriRepository->getAllSantriAktif();
    }

    // output {'laki-laki':4, 'perempuan':3}
    public function countSantriByGender()
    {
        $santri =  $this->santriRepository->countSantriByGender();
        $hitung = $santri->map(function($item){
            return count($item);
        });
        $index = $hitung->keys();
        $jumlah=[
            'perempuan'=>0,
            'laki-laki'=>0
        ];
        for ($i=0; $i < sizeof($index); $i++) { 
            $jumlah[$index[$i]]= $hitung[$index[$i]];
        }
        return $jumlah;
        
    }
    
    public function countSantriByIsActive()
    {
        $santri =  $this->santriRepository->countSantriByIsActive();
        $hitung = $santri->map(function($item){
            return count($item);
        });
        $index = $hitung->keys();
        $jumlah=[
            0=>0,
            1=>0
        ];
        for ($i=0; $i < sizeof($index); $i++) { 
            $jumlah[$index[$i]]= $hitung[$index[$i]];
        }
        return $jumlah;
    }

    public function countSantriByRT()
    {
        $santri =  $this->santriRepository->countSantriByRT();

        $rtHaveSantri = $santri->map(function($item){
                return count($item);
        }); 

        $index = $rtHaveSantri->keys();
        for ($i=1; $i < 16; $i++) { 
            $jumlahSantriPerRT[$i] = 0;
        }
        for ($i=0; $i < sizeof($index); $i++) { 
            $jumlahSantriPerRT[$index[$i]] = $rtHaveSantri[$index[$i]];
        }
        

        return $jumlahSantriPerRT;
    }

}
