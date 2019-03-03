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
}
