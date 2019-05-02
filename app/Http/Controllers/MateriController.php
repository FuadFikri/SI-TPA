<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MateriService;
use App\Services\KelasService;
use App\Materi;
use Illuminate\Support\Facades\Gate;
class MateriController extends Controller
{
    
    protected $materiService;

    public function __construct(MateriService $materiService,
                                KelasService $kelasService )
    {
        $this->materiService = $materiService;
        $this->kelasService = $kelasService;
        $this->middleware(function($request, $next){
            if(Gate::allows('manage-data-master')) return $next($request);  
            abort(403, 'Anda tidak memiliki cukup hak akses');});
    }
    public function index()
    {
        $daftar_materi = $this->materiService->getAll();
        return view('materi.index', compact('daftar_materi'));
    }

    public function create()
    {
        $daftar_kelas = $this->kelasService->getAll();
        return view('materi.add',compact('daftar_kelas'));
    }

    public function store(Request $request)
    {
        $newmateri = $this->materiService->store($request);
        if($newmateri){
            return redirect()->route('materi.index')->with('status','data berhasil ditambahkan');
        }
    }

    public function show($id)
    {
        $materi = $this->materiService->showDetail($id);
        return view('materi.show',compact('materi'));
    }

    public function edit($id)
    {   
        $daftar_kelas = $this->kelasService->getAll();
        $materi = $this->materiService->edit($id);
        return view('materi.edit',compact('daftar_kelas','materi'));
    }

    public function update(Request $request, $id)
    {
        $new = $this->materiService->update($request, $id);
        if ($new) {
            return redirect()->route('materi.index')->with('status','data berhasil diperbaharui');
        }
    }

    public function destroy($id)
    {
        $materi = $this->materiService->delete($id);
        if($materi){
            return redirect()->route('materi.index')->with('status','data berhasil dihapus');
        }
    }

    public function searchMateriAjax(Request $request)
    {
        return $this->materiService->searchMateriAjax($request);
    }

}
