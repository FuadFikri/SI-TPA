<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\KelasService;
use App\Kelas;
use Illuminate\Support\Facades\Gate;
class KelasController extends Controller
{
    
    protected $kelasService;

    public function __construct(KelasService $kelasService )
    {
        $this->kelasService = $kelasService;
        $this->middleware(function($request, $next){
            if(Gate::allows('manage-data-master')) return $next($request);  
            abort(403, 'Anda tidak memiliki cukup hak akses');});
    }
    public function index()
    {
        $daftar_kelas = $this->kelasService->getAll();
        return view('kelas.index', compact('daftar_kelas'));
    }

    public function create()
    {
        return view('kelas.add');
    }

    public function store(Request $request)
    {
        $newkelas = $this->kelasService->store($request);
        if($newkelas){
            return redirect()->route('kelas.index')->with('status','data berhasil ditambahkan');
        }
    }

    public function show($id)
    {
        $kelas = $this->kelasService->showDetail($id);
        // dd($kelas);
        return view('kelas.show',compact('kelas'));
    }

    public function edit($id)
    {
        $kelas = $this->kelasService->edit($id);
        return view('kelas.edit',compact('daftar_sekolah','daftar_kelas','kelas'));
    }

    public function update(Request $request, $id)
    {
        $new = $this->kelasService->update($request, $id);
        if ($new) {
            return redirect()->route('kelas.index')->with('status','data berhasil diperbaharui');
        }
    }

    public function destroy($id)
    {
        $kelas = $this->kelasService->delete($id);
        if($kelas){
            return redirect()->route('kelas.index')->with('status','data berhasil dihapus');
        }
    }

}
