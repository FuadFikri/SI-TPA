<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MateriService;
use App\Services\KelasService;
use App\Materi;
class MateriController extends Controller
{
    
    protected $materiService;

    public function __construct(MateriService $materiService,
                                KelasService $kelasService )
    {
        $this->materiService = $materiService;
        $this->kelasService = $kelasService;
    }
    public function index()
    {
        $daftar_materi = Materi::where('id' , '>', 0)
                                ->orderBy('created_at','desc') 
                                ->paginate(5);
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
        // dd($materi);
        return view('materi.show',compact('materi'));
    }

    public function edit($id)
    {
        $materi = $this->materiService->edit($id);
        return view('materi.edit',compact('daftar_sekolah','daftar_materi','materi'));
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
