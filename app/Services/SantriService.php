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
        $santriUpdated->url_foto= $this->santriRepository->uploadFoto($request);
        $santriUpdated->save();
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
}
