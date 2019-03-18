<?php

namespace App\Repositories;

class CrudRepository{
    protected $model;

    public function __construct()
    {

    }
    public function index()
    {
        return $this->model::all();
    }

    public function store($request)
    {
        $dataRequest = $this->data($request);
        $new = $this->model::create($dataRequest);
        return $new;
    }

    public function update($request,$id)
    {
        $data = $this->model::find($id);
        $dataRequest = $this->data($request);
        $data->update($dataRequest);
        return $data;
    }

    public function show($id)
    {
        $data = $this->model::find($id);
        return $data;
    }
    public function delete($id)
    {
        $data = $this->model::find($id);
        $data->delete();
        return $data;
    }

    public function data($request)
    {
    
    }
}