<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SekolahService;
use App\Services\SantriService;
use App\Services\KelasService;
class DataMasterList extends Controller
{
    protected $sekolahService;
    protected $santriService;
    protected $kelasService;
    function __construct(SekolahService $sekolahService, KelasService $kelasService, SantriService $santriService){
        $this->sekolahService = $sekolahService;
        $this->santriService = $santriService;
        $this->kelasService = $kelasService;
    }
    public function __invoke(Request $request)
    {
        $jumlah_santri = $this->santriService->count();
        $jumlah_kelas = $this->kelasService->count();
        $jumlah_sekolah = $this->sekolahService->count();
        
        return view('data-master.index', compact('jumlah_santri','jumlah_sekolah','jumlah_kelas'));
    }
}
