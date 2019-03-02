<?php

namespace App\Repositories;
use App\Santri;
use Illuminate\Database\Eloquent\Model;
class SantriRepository
{
    protected $model;

    public function __construct(Santri $santri)
    {
        $this->model = $santri;
    }
    public function getAll()
    {
        return $this->model::all();
    }
    public function getPaginate($num)
    {
        return $this->model::simplePaginate($num);
            
    }

    public function store(Request $request)
    {

    }

    
}

