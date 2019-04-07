<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SantriService;
use App\Services\KelasService;
use App\Services\SekolahService;
class DashboardController extends Controller
{
    protected $santriService, $sekolahService, $kelasService;

    function __construct(SantriService $santriService, KelasService $kelasService, SekolahService $sekolahService )
    {
        $this->santriService = $santriService;
        $this->kelasService = $kelasService;
        $this->sekolahService = $sekolahService;
    }
    public function index()
    {   $kelas = $this->kelasService->countSantriByKelas();
        $gender = $this->santriService->countSantriByGender();
        $sekolah =  $this->sekolahService->countSantriBySekolah();
        return  view('dashboard', compact  ('sekolah',
                                            'gender',
                                            'kelas'));
    }
}
