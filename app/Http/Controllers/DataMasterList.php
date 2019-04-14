<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SekolahService;
use App\Services\SantriService;
use App\Services\KelasService;
use App\Services\MateriService;
use App\Services\UserService;
use Illuminate\Support\Facades\Gate;
class DataMasterList extends Controller
{
    protected $sekolahService;
    protected $santriService;
    protected $kelasService;
    protected $materiService;
    protected $userService;
    function __construct(   SekolahService $sekolahService, 
                            KelasService $kelasService,
                            SantriService $santriService,
                            MateriService $materiService,
                            UserService $userService){
        $this->sekolahService = $sekolahService;
        $this->santriService = $santriService;
        $this->kelasService = $kelasService;
        $this->materiService = $materiService;
        $this->userService = $userService;
        $this->middleware(function($request, $next){
            if(Gate::allows('manage-data-master')) return $next($request);  
            abort(403, 'Anda tidak memiliki cukup hak akses');});
        
    }
    public function __invoke(Request $request)
    {
        $jumlah_santri = $this->santriService->count();
        $jumlah_kelas = $this->kelasService->count();
        $jumlah_sekolah = $this->sekolahService->count();
        $jumlah_materi = $this->materiService->count();
        $jumlah_user = $this->userService->count();
        
        return view('data-master.index', 
                compact('jumlah_santri','jumlah_sekolah','jumlah_kelas','jumlah_materi','jumlah_user'));
    }
}
