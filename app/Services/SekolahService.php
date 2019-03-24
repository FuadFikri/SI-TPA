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
}
