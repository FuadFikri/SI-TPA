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
    public function getPaginate($num)
    {
        return $this->santriRepository->getPaginate($num)
                ->sortBy('nama_panggilan');
    }
    public function store($request)
    {
        return $this->santriRepository->store($request);
    }
    public function showDetail($id)
    {
        return $this->santriRepository->show($id);
    }

}
