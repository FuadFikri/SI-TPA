<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\KelasService;
use App\Kelas;
class KelasController extends Controller
{
    
    protected $kelasService;

    public function __construct(KelasService $kelasService )
    {
        $this->kelasService = $kelasService;
    }
    public function index()
    {
        $daftar_kelas = Kelas::where('id', '>' ,0 )
                        ->orderBy('nama_panggilan','asc')
                        ->paginate(5);
        return view('kelas.index', compact('daftar_kelas'));
    }

    public function create()
    {
        $daftar_sekolah = $this->getDaftarSekolah();
        $daftar_kelas = $this->getDaftarKelas();
        return view('kelas.add',compact('daftar_sekolah','daftar_kelas'));
    }

    public function store(Request $request)
    {
        $newkelas = $this->kelasService->store($request);
        if($newkelas)echo "success";
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
            echo "updated";
        }
    }

    public function destroy($id)
    {
        //
    }

    public function get_import()
    {
        return view('kelas.import');
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
