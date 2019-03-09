<?php
namespace App\Services;
use App\Repositories\UjianRepository;

class UjianService
{
    protected $ujianRepository;

    public function __construct(UjianRepository $ujianRepository)
    {
        $this->ujianRepository = $ujianRepository;
    }

    public function getAll()
    {
        return $this->ujianRepository->index();
    }
    public function store($request)
    {
        return $this->ujianRepository->store($request);
    }
    public function showDetail($id)
    {
        return $this->ujianRepository->show($id);
    }
    public function edit($id)
    {
        return $this->ujianRepository->show($id);
    }
    public function update($request, $id)
    {
        return $this->ujianRepository->update($request, $id);
    }

}
