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
    {
        $jumlah =  $this->sekolahService->getJumlahSantriPerSekolah();
        $nama_sekolah =  $this->sekolahService->getNamaSekolah();
        return  view('dashboard',
                compact('nama_sekolah',
                        'jumlah'));
    }
}
