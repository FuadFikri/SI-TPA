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
}
