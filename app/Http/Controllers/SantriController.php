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
        $daftar_santri = Santri::where('id', '>' ,0 )
                        ->orderBy('nama_panggilan','asc')
                        ->paginate(5);
        return view('santri.index', compact('daftar_santri'));
    }

    public function create()
    {
        $daftar_sekolah = $this->getDaftarSekolah();
        $daftar_kelas = $this->getDaftarKelas();
        return view('santri.add',compact('daftar_sekolah','daftar_kelas'));
    }

    public function store(Request $request)
    {
        $newSantri = $this->santriService->store($request);
        if($newSantri)echo "success";
    }

    public function show($id)
    {
        $santri = $this->santriService->showDetail($id);
        // dd($santri);
        return view('santri.show',compact('santri'));
    }

    public function edit($id)
    {
        $santri = $this->santriService->edit($id);
        $daftar_sekolah = $this->getDaftarSekolah();
        $daftar_kelas = $this->getDaftarKelas();
        return view('santri.edit',compact('daftar_sekolah','daftar_kelas','santri'));
    }

    public function update(Request $request, $id)
    {
        $new = $this->santriService->update($request, $id);
        if ($new) {
            echo "updated";
        }
    }

    public function destroy($id)
    {
        //
    }

    public function get_import()
    {
        return view('santri.import');
    }

    private function getDaftarSekolah()
    {
        return $this->sekolahService->getAll();
    }
    private function getDaftarKelas()
    {
        return $this->kelasService->getAll();
    }
}
