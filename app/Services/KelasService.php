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
        return $this->KelasRepository->store($request);
    }
    public function showDetail($id)
    {
        return $this->KelasRepository->show($id);
    }
    public function edit($id)
    {
        return $this->KelasRepository->show($id);
    }
    public function update($request, $id)
    {
        return $this->KelasRepository->update($request, $id);
        
    }

}
