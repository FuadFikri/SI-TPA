<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SantriService;
use App\Services\SekolahService;
use App\Services\KelasService;
use App\Santri;
class SantriController extends Controller
{
    
    protected $santriService;
    protected $sekolahService;
    protected $kelasService;

    public function __construct(SantriService $santriService, 
                                SekolahService $sekolahService,
                                KelasService $kelasService )
    {
        $this->santriService = $santriService;
        $this->sekolahService = $sekolahService;
        $this->kelasService = $kelasService;
    }
    public function index()
    {
        $daftar_santri =  $this->santriService->getAll();
        return view('santri.index', compact('daftar_santri'));
    }

    public function create()
    {
        $daftar_sekolah = $this->_getDaftarSekolah();
        $daftar_kelas = $this->_getDaftarKelas();
        return view('santri.add',compact('daftar_sekolah','daftar_kelas'));
    }

    public function store(Request $request)
    {
        $newSantri = $this->santriService->store($request);
        if($newSantri){
            return redirect()->route('santri.index')->with('status','data berhasil ditambahkan');
        }
    }

    public function show($id)
    {
        $santri = $this->santriService->showDetail($id);
        return view('santri.show',compact('santri'));
    }

    public function edit($id)
    {
        $santri = $this->santriService->edit($id);
        $daftar_sekolah = $this->_getDaftarSekolah();
        $daftar_kelas = $this->_getDaftarKelas();
        return view('santri.edit',compact('daftar_sekolah','daftar_kelas','santri'));
    }

    public function update(Request $request, $id)
    {
        $santriUpdated = $this->santriService->update($request, $id);
        if($santriUpdated){
            return redirect()->route('santri.index')->with('status','data berhasil diperbaharui');
        }
    }

    public function destroy($id)
    {
        $santri = $this->santriService->delete($id);
        if($santri){
            return redirect()->route('santri.index')->with('status','data berhasil dihapus');
        }
    }

    private function _getDaftarSekolah()
    {
        return $this->sekolahService->getAll();
    }
    private function _getDaftarKelas()
    {
        return $this->kelasService->getAll();
    }
}
