<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SekolahService;
use App\Services\SantriService;
use App\Services\KelasService;
use App\Services\MateriService;
class DataMasterList extends Controller
{
    protected $sekolahService;
    protected $santriService;
    protected $kelasService;
    protected $materiService;
    function __construct(   SekolahService $sekolahService, 
                            KelasService $kelasService,
                            SantriService $santriService,
                            MateriService $materiService){
        $this->sekolahService = $sekolahService;
        $this->santriService = $santriService;
        $this->kelasService = $kelasService;
        $this->materiService = $materiService;
    }
    public function __invoke(Request $request)
    {
        $jumlah_santri = $this->santriService->count();
        $jumlah_kelas = $this->kelasService->count();
        $jumlah_sekolah = $this->sekolahService->count();
        $jumlah_materi = $this->materiService->count();
        
        return view('data-master.index', 
                compact('jumlah_santri','jumlah_sekolah','jumlah_kelas','jumlah_materi'));
    }
}
