<?php
namespace App\Services;

use App\Materi;
use App\Repositories\MateriRepository;

class MateriService
{
    protected $materiRepository;

    public function __construct(MateriRepository $materiRepository)
    {
        $this->materiRepository = $materiRepository;
    }

    public function getAll()
    {
        return $this->materiRepository->index();
    }

    public function store($request)
    {
        return $this->materiRepository->store($request);
    }
    public function showDetail($id)
    {
        return $this->materiRepository->show($id);
    }
    public function edit($id)
    {
        return $this->materiRepository->show($id);
    }
    public function update($request, $id)
    {
        return $this->materiRepository->update($request, $id);
        
    }
    public function delete($id)
    {
        return $this->materiRepository->delete($id);
    }
    public function count()
    {
        return $this->materiRepository->count();
    }

    public function getMateriUjianByKelas($kelas_id)
    {
        return $this->materiRepository->materiUjianByKelas($kelas_id);
    }
    public function searchMateriAjax($request)
    {
        return $this->materiRepository->searchMateriAjax($request);
    }

}
