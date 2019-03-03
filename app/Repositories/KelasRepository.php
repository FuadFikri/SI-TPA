<?php

namespace App\Repositories;
use App\Kelas;
use Illuminate\Database\Eloquent\Model;
class KelasRepository
{
    protected $model;

    public function __construct(Kelas $kelas)
    {
        $this->model = $kelas;
    }

    public function index()
    {
        return $this->model::All();;
    }
}

