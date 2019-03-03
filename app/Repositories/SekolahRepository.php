<?php

namespace App\Repositories;
use App\Sekolah;
use Illuminate\Database\Eloquent\Model;
class SekolahRepository
{
    protected $model;

    public function __construct(Sekolah $sekolah)
    {
        $this->model = $sekolah;
    }

    public function index()
    {
        return $this->model::All();;
    }
   
}

