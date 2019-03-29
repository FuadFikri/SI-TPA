<?php
namespace App\Repositories;
use App\Materi;
use Illuminate\Database\Eloquent\Model;

class MateriRepository extends CrudRepository{
    public $model;

    public function __construct(Materi $materi)
    {
        $this->model = $materi;
    }

    public function data($request)
    {
        $data = [
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'parameter_kelulusan' => $request->parameter_kelulusan,
            'link_materi' => $request->link_materi,
            'kelas_id' => $request->kelas_id
        ];
        return $data;
    }

    public function materiUjianByKelas($kelas_id)
    {
        return $this->model::where('kelas_id',$kelas_id)->get();
    }
    public function searchMateriAjax($request)
    {
        $keyword = $request->get('q');
        $materi = $this->model::where('judul','LIKE',"%$keyword")->get();
        return $materi;
    }

}

?>